<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>@if (!empty($title)) {{ $title }} - @endif {{ $sitename }}</title>
	<link rel='shortcut icon' href="{{ Config::get('app.asset_url') }}images/share/logo.ico" type='image/x-icon' />
	<link href="{{ Config::get('app.asset_url') . 'css/customer/common.css?' . Ca\Consts::$ca_version }}" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{{ Config::get('app.asset_url') }}scripts/jquery.js"></script>
</head>

<body>
<div class="main_banner main_banner_a">
	<div class="frame_1 banner"></div>
</div>
@if (View::exists('customer' . App::make('customer')->alias . '.partials.header'))
@include('customer' . App::make('customer')->alias . '.partials.header')
@else
@include('customer.common.partials.header')
@endif
<div class="main_content_frame">
	{{ $content }}
</div>
@if (View::exists('customer' . App::make('customer')->alias . '.partials.header'))
@include('customer' . App::make('customer')->alias . '.partials.footer')
@else
@include('customer.common.partials.footer')
@endif
</body>
</html>