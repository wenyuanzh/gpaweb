<script type="text/javascript" src="{{ Config::get('app.asset_url') }}scripts/share.usercenter.js"></script>
<script type="text/javascript">
$(function() {
	$.shareUserCenter({
		deleteUrl: "/usercenter/topic/delete",
		emptyRow: '<tr class="none"><td colspan="3"><span>你还没有建立专题</span></td></tr>',
		mouseenterAction: function() {
			if ($(this).hasClass("none") || $(this).hasClass("loading")) {
				return false;
			}
			var topicId = $(this).attr("eid");
			var rowActions = $("<span/>").addClass("actions");

			var modifyA = $("<a/>")
				.attr({ "href": "/usercenter/topic/modify?id=" + topicId, "title": "修改专题"})
				.addClass("action_link_1 actl_1_modify modify");
			var delA = $("<a/>")
				.attr({ "href": "#", "title": "删除"})
				.addClass("action_link_1 actl_1_delete");

			rowActions.append(modifyA, delA);
			$("td:eq(1)", this).append($(rowActions));
			return false;
		}
	});

	@if (Session::has('information'))
		showInformation("{{ Session::get(('information')) }}");
	@endif


});
</script>
<div class="dialog_1" id="dialogDelete">
	<div class="header"><span>删除专题</span><a class="close"></a></div>
	<div class="confirm">是否删除选择的专题?</div>
	<div class="actions">
		<a href="#" class="button_1 submit"><span>确定</span></a>
		<a class="close" href="#">取消</a>
	</div>
</div>
<div class="my_topic">
	<ul class="tabsheet_2">
		<li class="selected"><a>我的专题</a></li>
		<li class="info"><span>共 <strong class="count_topic">{{ $topics->getTotal() }}</strong> 个</span></li>
	</ul>
	<div class="spacer_1"></div>
	<div class="information_1" style="display:none"><div class="success"></div><span class="close"></span></div>
	<div class="main_actions">
		<a class="button_3 btn_3_new_folder new_topic" href="/usercenter/topic/new"><span>新建专题</span></a>
		<a class="button_3 button_3_disabled btn_3_del_file delete_topic" href="#"><span>删除</span></a>
		<div class="clear"></div>
	</div>
	<table class="table_1">
		<tr>
			<th style="text-align:left" colspan="2">专题名称</th>
			<th style="width:80px; text-align:right">创建日期</th>
		</tr>
		@foreach ($topics as $topic)
		<tr type="1" eid="{{ $topic->topicid }}" >
			<td class="check">
				<input class="check" type="checkbox" value="{{ $topic->topicid }}" />
			</td>
			<td style="text-align:left">
				<a class="title topic" href="/topic/detail?id={{ $topic->topicid }}" target="_blank" title="{{ $topic->name }}">
					{{ $topic->name }}
				</a>
			</td>
			<td style="text-align:right">{{ Ca\Common::datetime_to_date($topic->createdate, 'Y-m-d') }}</td>
		</tr>
		@endforeach
		@if ($topics->getTotal() == 0)
		<tr class="none">
			<td colspan="3">
				<span>你还没有建立专题!</span>
			</td>
		</tr>
		@endif
	</table>
	@if ($topics->getLastPage() > 1)
	{{ $topics->links() }}
	@endif
</div>