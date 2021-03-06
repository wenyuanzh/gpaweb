/* vim: set shiftwidth=2 tabstop=2 autoindent cindent expandtab filetype=javascript : */
/*
 * pdf2htmlEX.js : a simple demo UI for pdf2htmlEX
 *
 * handles UI events/actions/effects
 * Copyright 2012,2013 Lu Wang <coolwanglu@gmail.com>
 */

'use strict';

/* The namespace */
var pdf2htmlEX = (function(){
  var pdf2htmlEX = new Object();

  var CSS_CLASS_NAMES = {
    page_frame       : 'pf',
    page_decoration  : 'pd',
    page_content_box : 'pc',
    page_data        : 'pi',
    background_image : 'bi',
    link             : 'l',
    __dummy__        : 'no comma'
  };

  var DEFAULT_CONFIG = {
    // id of the element to put the pages in
    container_id : 'page-container',
    // id of the element for sidebar (to open and close)
    sidebar_id : 'sidebar',
    // id of the element for outline
    outline_id : 'outline',
    // class for the loading indicator
    loading_indicator_cls : 'loading_indicator_cls',
    // How many page shall we preload that are below the last visible page
    preload_pages : 3,
    // Smooth zoom is enabled when the number of pages shown is less than the threshold
    // Otherwise page content is hidden and redrawn after a delay (function schedule_render).
    // 0: disable smooth zoom optimizations (less CPU usage but flickering on zoom)
    smooth_zoom_threshold : 4,
    // how many ms should we wait before actually rendering the pages and after a scroll event
    render_timeout : 100,
    // zoom ratio step for each zoom in/out event
    scale_step : 0.9,

    __dummy__        : 'no comma'
  };

  var EPS = 1e-6;
  var invert = function(ctm) {
    var det = ctm[0] * ctm[3] - ctm[1] * ctm[2];
    var ictm = new Array();
    ictm[0] = ctm[3] / det;
    ictm[1] = -ctm[1] / det;
    ictm[2] = -ctm[2] / det;
    ictm[3] = ctm[0] / det;
    ictm[4] = (ctm[2] * ctm[5] - ctm[3] * ctm[4]) / det;
    ictm[5] = (ctm[1] * ctm[4] - ctm[0] * ctm[5]) / det;
    return ictm;
  };
  var transform = function(ctm, pos) {
    return [ctm[0] * pos[0] + ctm[2] * pos[1] + ctm[4]
           ,ctm[1] * pos[0] + ctm[3] * pos[1] + ctm[5]];
  };
  var Page = function(page, container) {
    if(page == undefined) return;

    this.loaded = false;
    this.shown = false;
    this.$p = $(page);
    this.$container = $(container);

    this.n = parseInt(this.$p.data('page-no'), 16);
    this.$b = $('.'+CSS_CLASS_NAMES['page_content_box'], this.$p);
    this.$d = this.$p.parent('.'+CSS_CLASS_NAMES['page_decoration']);

    // page size
    // Need to make rescale work when page_content_box is not loaded, yet
    this.h = this.$p.height();     
    this.w = this.$p.width();

    // if page is loaded
    if (this.$b.length > 0) {
      /*
       * scale ratios
       *
       * default_r : the first one
       * set_r : last set
       * cur_r : currently using
       */
      this.default_r = this.set_r = this.cur_r = this.h / this.$b.height();

      this.data = $($('.'+CSS_CLASS_NAMES['page_data'], this.$p)[0]).data('data');

      this.ctm = this.data.ctm;
      this.ictm = invert(this.ctm);

      this.loaded = true;
    }
  };
  $.extend(Page.prototype, {
    /* hide & show are for contents, the page frame is still there */
    hide : function(){
      this.$b.removeClass('opened');
      this.shown = false;
    },
    show : function(){
      if (this.loaded) {
        if(Math.abs(this.set_r - this.cur_r) > EPS) {
          this.cur_r = this.set_r;
          this.$b.css('transform', 'scale('+this.cur_r.toFixed(3)+')');
        }
        if (! this.shown) {
          this.$b.addClass('opened');
          this.shown = true;
        }
      }
    },
    rescale : function(ratio, keep_shown) {
      if(ratio == 0) {
        this.set_r = this.default_r;
      } else {
        this.set_r = ratio;
      }

      if (keep_shown)
        this.show();    // Refresh content
      else
        this.hide();    // Wait for redraw

      this.$d.height(this.h * this.set_r);
      this.$d.width(this.w * this.set_r);
    },
    /* return if any part of this page is shown in the container */
    is_visible : function() {
      var off = this.position();
      return !((off[1] > this.h) || (off[1] + this.$container.height() < 0));
    },
    /* return if this page or any neighbor of it is visible */
    is_nearly_visible : function() {
      var off = this.position();
      /* I should use the height of the previous page or the next page here
       * but since they are not easily available, just use '*2', which should be a good estimate in most cases
       */
	    //console.log(-off[1] - this.h,  $(document.body)[0].scrollTop , -off[1] + this.h,  $(document.body)[0].scrollTop);
      return (-off[1] - this.h <= $(document.body)[0].scrollTop && -off[1] + this.h >= $(document.body)[0].scrollTop)
	      || (-off[1] - this.h * 2 <= $(document.body)[0].scrollTop && -off[1] + this.h * 2 >= $(document.body)[0].scrollTop);
	    //return !((off[1] > this.h * 2) || (off[1] + this.$container.height() * 2 < 0));
    },
    /* return the coordinate of the top-left corner of container
     * in our coordinate system
     */
    position : function () {
      var off = this.$p.offset();
      var off_c = this.$container.offset();
//
//	    off_c.top = $(document.body)[0].scrollTop - off_c.top;
//	    console.log(off_c.top - off.top);
      return [off_c.left-off.left, off_c.top-off.top];
    }
  });

  pdf2htmlEX.Viewer = function(config) {
    this.config = $.extend({}, DEFAULT_CONFIG, config);
    this.pages_loading = {};
    this.init_before_loading_content();

    var _ = this;
    $(function(){_.init_after_loading_content();});
  };

  $.extend(pdf2htmlEX.Viewer.prototype, {
    scale : 1,

    init_before_loading_content : function() {
      /*hide all pages before loading, will reveal only visible ones later */
      this.pre_hide_pages();
    },

    init_after_loading_content : function() {
      this.$sidebar = $('#'+this.config['sidebar_id']);
      this.$outline = $('#'+this.config['outline_id']);
      this.$container = $('#'+this.config['container_id']);
      this.$loading_indicator = $('.'+this.config['loading_indicator_cls']);

      // Open the outline if nonempty
      if(this.$outline.children().length > 0) {
        this.$sidebar.addClass('opened');
      }


      // register schedule rendering
      var _ = this;
      this.$container.scroll(function(){ _.schedule_render(); });

      //this.register_key_handler();

      // handle links
      this.$container.add(this.$outline).on('click', '.'+CSS_CLASS_NAMES['link'], this, this.link_handler);

      this.render();
    },

    find_pages : function() {
      var new_pages = new Array();
      var $pl= $('.'+CSS_CLASS_NAMES['page_frame'], this.$container);
      /* don't use for(..in..) since $pl is more than an Array */
      for(var i = 0, l = $pl.length; i < l; ++i) {
        var p = new Page($pl[i], this.$container);
        new_pages[p.n] = p;
      }
      this.pages = new_pages;
    },

    load_page : function(idx, pages_to_preload, successCallback, errorCallback) {
      if (idx >= this.pages.length)
        return;  // Page does not exist

      if (this.pages[idx].loaded)
        return;  // Page is loaded

      if (this.pages_loading[idx])
        return;  // Page is already loading

      var page_no_hex = idx.toString(16);
      var $pf = this.$container.find('#' + CSS_CLASS_NAMES['page_frame'] + page_no_hex);
      if($pf.length == 0)
        return;  // Page does not exist

      this.$loading_indicator.clone().show().appendTo($pf);

      var _ = this;

      var url = $pf.data('page-url');
      if (url && url.length > 0) {
        this.pages_loading[idx] = true;       // Set semaphore

        $.ajax({
          url: url,
          dataType: 'text'
        }).done(function(data){
          // replace the old page with loaded data
          // the loading indicator on this page should also be destroyed
          _.pages[idx].$d.replaceWith(data);


          var $new_pf = _.$container.find('#' + CSS_CLASS_NAMES['page_frame'] + page_no_hex);
          _.pages[idx] = new Page($new_pf, _.$container);
          _.pages[idx].hide();
          _.pages[idx].rescale(_.scale);
          _.schedule_render();

          // disable background image dragging
          $new_pf.find('.'+CSS_CLASS_NAMES['background_image']).on('dragstart', function(e){return false;});

          // Reset loading token
          delete _.pages_loading[idx];
	      if ($new_pf.parents(".fullscreen").length > 0) {
		      jQuery($new_pf.parent()).append('<div class="switch_fullscreen switch_fullscreen_2"></div>');
	      } else {
		      jQuery($new_pf.parent()).append('<div class="switch_fullscreen"></div>');
	      }
			jQuery($new_pf.parent()).append('<div class="pagenumber">' + idx + '</div>');
          if (successCallback) successCallback();

			//调整ie浏览器下的字体大小
			if ((navigator.userAgent.indexOf('MSIE') >= 0) && (navigator.userAgent.indexOf('Opera') < 0)) {
				for (var i = 0; i < 20; i++) {
					var fontSize = $(".fs" + i).css("fontSize");
					if (fontSize == undefined) continue;
					//console.log(".fs" + i);
					//console.log(fontSize);
					$(".fs" + i).css({"fontSize" : (parseFloat(fontSize)/1.35) + "px"});
				}
			}

        }
        ).fail(function(jqXHR, textStatus, errorThrown){
          console.error('error loading page ' + idx + ': ' + textStatus);

          // Reset loading token
          delete _.pages_loading[idx];

          if (errorCallback) errorCallback();
        });
      }
      // Concurrent prefetch of the next pages
      if (pages_to_preload === undefined)
        pages_to_preload = this.config['preload_pages'];

      if (--pages_to_preload > 0)
        _.load_page(idx+1, pages_to_preload);
    },

    pre_hide_pages : function() {
      /* pages might have not been loaded yet, so add a CSS rule */
      var s = '@media screen{.'+CSS_CLASS_NAMES['page_content_box']+'{display:none;}}';
      var n = document.createElement('style');
      n.type = 'text/css';
      if (n.styleSheet) {
        n.styleSheet.cssText = s;
      } else {
        n.appendChild(document.createTextNode(s));
      }
      document.getElementsByTagName('head')[0].appendChild(n);
    },

    hide_pages : function() {
      var pl = this.pages;
      for(var i in pl)
        pl[i].hide();
    },

    render : function () {
	    this.find_pages();
      /* hide (positional) invisible pages */
      var pl = this.pages;
      for(var i in pl) {
        var p = pl[i];
        if(p.is_nearly_visible()){
          if (p.loaded) {
            p.show();
          } else
            this.load_page(p.n);
        } else {
          p.hide();
        }
      }
    },

    schedule_render : function() {
      if(this.render_timer)
        clearTimeout(this.render_timer);

      var _ = this;
      this.render_timer = setTimeout(function () {
        _.render();
      }, this.config['render_timeout']);
    },

    /*
     * Handling key events, zooming, scrolling etc.
     */
    register_key_handler: function () {
      /* 
       * When user try to zoom in/out using ctrl + +/- or mouse wheel
       * handle this and prevent the default behaviours
       *
       * Code credit to PDF.js
       */
      var _ = this;
      // Firefox specific event, so that we can prevent browser from zooming
      $(window).on('DOMMouseScroll', function(e) {
        if (e.ctrlKey) {
          e.preventDefault();
          _.rescale(Math.pow(_.config['scale_step'], e.detail), true);
        }
      });

      $(window).on('keydown', function keydown(e) {
        var handled = false;
        var cmd = (evt.ctrlKey ? 1 : 0) |
          (evt.altKey ? 2 : 0) |
          (evt.shiftKey ? 4 : 0) |
          (evt.metaKey ? 8 : 0);
        var with_ctrl = (cmd == 9);
        var with_alt = (cmd == 2);
        switch (e.keyCode) {
          case 61: // FF/Mac '='
          case 107: // FF '+' and '='
          case 187: // Chrome '+'
            if(with_ctrl){
              _.rescale(1.0 / _.config['scale_step'], true);
              handled = true;
            }
            break;
          case 173: // FF/Mac '-'
          case 109: // FF '-'
          case 189: // Chrome '-'
            if(with_ctrl){
              _.rescale(_.config['scale_step'], true);
              handled = true;
            }
            break;
          case 48: // '0'
            if(with_ctrl){
              _.rescale(0, false);
              handled = true;
            }
            break;
          case 33: // Page UP:
            if (with_alt) { // alt-pageup    -> scroll one page up
              _.scroll_to(_.get_prev_page());
            } else { // pageup        -> scroll one screen up
              _.$container.scrollTop(_.$container.scrollTop()-_.$container.height());
            }
            handled = true;
            break;
          case 34: // Page DOWN
            if (with_alt) { // alt-pagedown  -> scroll one page down
              _.scroll_to(_.get_next_page());
            } else { // pagedown      -> scroll one screen down
              _.$container.scrollTop(_.$container.scrollTop()+_.$container.height());
            }
            handled = true;
            break;
          case 35: // End
            if (with_ctrl) {
              _.$container.scrollTop(_.$container[0].scrollHeight);
              handled = true;
            }
            break;
          case 36: // Home
            if (e.with_ctrl) {
              _.$container.scrollTop(0);
              handled = true;
            }
            break;
        }
        if(handled) {
          e.preventDefault();
          return;
        }
      });
    },
    // Find the first page that is at least half a page below the current position
    get_next_page : function() {
      var page_height = this.$container.height();

      var pl = this.pages;
      for(var i in pl) {
        var page = pl[i];
        var page_position = page.position();
        if (page_position[1] < position[1] - page_height/2)
          return page;
      }
      return undefined;
    },

    // Find the last page that is at least half a page above the current position
    get_prev_page : function() {
      var page_height = this.$container.height();

      var pl = this.pages.slice().reverse();
      for(var i in pl) {
        var page = pl[i];
        var page_position = page.position();
        if (page_position[1] > position[1] + page_height/2)
          return page;
      }
      return undefined;
    },

    rescale : function (ratio, is_relative, offsetX, offsetY) {
      if (! offsetX)
        offsetX = 0;
      if (! offsetY)
        offsetY = 0;

      // Save offset of the active page
      var active_page = this.get_active_page();
      if(!active_page) return;

      var prev_offset = active_page.$p.offset();
      var old_scale = this.scale;
      var pl = this.pages;

      var prerendering_enabled = false;
      if (this.config['smooth_zoom_threshold'] > 0) {
        // Immediate rendering optimizations enabled to improve reactiveness while zooming
        // Find out which pages are visible
        var min_visible, max_visible;
        min_visible = max_visible = active_page.n;
        while (pl[min_visible] && pl[min_visible].is_visible()) { --min_visible; }
        ++ min_visible;
        while (pl[max_visible] && pl[max_visible].is_visible()) { ++max_visible; }
        -- max_visible;

        // If less then the threshold, enable prerendering on selected pages
        if (max_visible - min_visible + 1 < this.config['smooth_zoom_threshold'])
          prerendering_enabled = true;
      }

      // Set new scale
      if (is_relative)
        this.scale *= ratio;
      else
        this.scale = ratio;

      // Rescale pages
      for(var i in pl) {
        if (prerendering_enabled && i >= min_visible && i <= max_visible)
          pl[i].rescale(this.scale, true);    // Force immediate refresh
        else
          pl[i].rescale(this.scale);          // Delayed refresh
      }

      // Correct container scroll to keep view aligned while zooming
      var correction_top = active_page.$p.offset().top - prev_offset.top;
      this.$container.scrollTop( this.$container.scrollTop() + correction_top + offsetY );

      // Take the center of the view as a reference
      var prev_center_x = this.$container.width() / 2 - prev_offset.left;
      // Calculate the difference respect the center of the view after the zooming
      var correction_left = prev_center_x * (this.scale/old_scale - 1) + active_page.$p.offset().left - prev_offset.left;
      // Scroll the container accordingly to keep alignment to the initial reference
      this.$container.scrollLeft( this.$container.scrollLeft() + correction_left + offsetX );

      // Delayed rendering for pages not already shown
      this.schedule_render();
    },

    fit_width : function () {
      var active_page = this.get_active_page();
      if(!active_page) return;

      this.rescale(this.$container.width() / active_page.w, false);
      this.scroll_to(active_page.n, [0,0]);
    },

    fit_height : function () {
      var active_page = this.get_active_page();
      if(!active_page) return;

      this.rescale(this.$container.height() / active_page.h, false);
      this.scroll_to(active_page.n, [0,0]);
    },

    get_active_page : function () {
      // get page that are on the center of the view     //TODO better on top?!
      var y_center = this.$container.offset().top + this.$container.height() / 2;
      var pl = this.pages;
      var last_page = -1;
      for (var i in pl) {
        if (pl[i].$p.offset().top > y_center)
          break;
        last_page = i;
      }
      return pl[last_page];
    },

    get_containing_page : function(obj) {
      /* get the page obj containing obj */
      var p = obj.closest('.'+CSS_CLASS_NAMES['page_frame'])[0];
      return p && this.pages[(new Page(p)).n];
    },

    link_handler : function (e) {
      var _ = e.data;
      var t = $(e.currentTarget);

      var cur_pos = [0,0];

      // cur_page might be undefined, e.g. from Outline
      var cur_page = _.get_containing_page(t);
      if(cur_page != undefined)
      {
        cur_pos = cur_page.position();
        //get the coordinates in default user system
        cur_pos = transform(cur_page.ictm, [cur_pos[0], cur_page.h-cur_pos[1]]);
      }

      var detail_str = t.attr('data-dest-detail');
      if(detail_str == undefined) return;

      var ok = false;
      var detail = JSON.parse(detail_str);

      var target_page = _.pages[detail[0]];
      if(target_page == undefined) return;

      var pos = [0,0];
      var upside_down = true;
      // TODO: zoom
      // TODO: BBox
      switch(detail[1]) {
        case 'XYZ':
          pos = [(detail[2] == null) ? cur_pos[0] : detail[2]
            ,(detail[3] == null) ? cur_pos[1] : detail[3]];
          ok = true;
          break;
        case 'Fit':
        case 'FitB':
          pos = [0,0];
          ok = true;
          break;
        case 'FitH':
        case 'FitBH':
          pos = [0, (detail[2] == null) ? cur_pos[1] : detail[2]];
          ok = true;
          break;
        case 'FitV':
        case 'FitBV':
          pos = [(detail[2] == null) ? cur_pos[0] : detail[2], 0];
          ok = true;
          break;
        case 'FitR':
          /* locate the top-left corner of the rectangle */
          pos = [detail[2], detail[5]];
          upside_down = false;
          ok = true;
          break;
        default:
          ok = false;
          break;
      }

      if(ok) {
        var transform_and_scroll = function() {
          pos = transform(target_page.ctm, pos);
          if(upside_down) {
            pos[1] = target_page.h - pos[1];
          }
          _.scroll_to(detail[0], pos);
        };

        if (target_page.loaded) {
          transform_and_scroll();
        } else {
          // Scroll to the exact position once loaded.
          _.load_page(target_page.n, 1, function() {
            target_page = _.pages[target_page.n];                   // Refresh reference
            transform_and_scroll();
          });

          // In the meantime page gets loaded, scroll approximately position for maximum responsiveness.
          _.scroll_to(detail[0], [0,0]);
        }
        e.preventDefault();
      }
    }, 

    /* pos=[x,y], where (0,0) is the top-left corner */
    scroll_to : function(pageno, pos) {
      var target_page = this.pages[pageno];
      if(target_page == undefined) return;

      if(pos == undefined)
        pos = [0,0];

      var cur_target_pos = target_page.position();

      this.$container.scrollLeft(this.$container.scrollLeft()-cur_target_pos[0]+pos[0]);
      this.$container.scrollTop(this.$container.scrollTop()-cur_target_pos[1]+pos[1]);
    },

    __last_member__ : 'no comma' /*,*/
  });

  return pdf2htmlEX;
})();
