<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Audiebox</title>
	<!-- STYLES -->
	<link href="/beta/assets/css/style.css" rel="stylesheet">
	<link href="/beta/assets/css/password_check.css" rel="stylesheet">
	<link href="/beta/assets/shadowbox/shadowbox.css" rel="stylesheet">
	<link href="/beta/assets/jpages/jPages.css" rel="stylesheet">
	<!-- HTML5 SHIM > IE6-8 -->
	<!--[if lt IE 9]>
	<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->	
</head>
<body>
<? if ($this->session->userdata('logged_in')) { ?>
<div id="wrapper"> 

<div id="content_wrapper"> 
<div id="content_inner_wrapper"> 
<div class="navbar">
  <div class="navbar-inner" id="dash-header">
			<a class="brand" href="/beta/dashboard/" name="top"><img src="/beta/assets/img/white_logo.png"></a>
				<ul class="nav pull-right" id="dash-nav">
					<li<? if ($this->uri->segment(1) == 'dashboard' AND $this->uri->segment(2) == '') { ?> class="active"<? } ?>><a href="/beta/dashboard/"><i class="icon-home"></i> Dashboard</a></li>
					<li class="divider-vertical"></li>
                  			<li<? if ($this->uri->segment(1) == 'dashboard' AND $this->uri->segment(3) == 'locations') { ?> class="active"<? } ?>><a href="/beta/dashboard/main/locations/"><i class="icon-wrench"></i> Settings</a></li>
					<li class="divider-vertical"></li>
					<li<? if ($this->uri->segment(1) == 'contact-us') { ?> class="active"<? } ?>><a href="/beta/contact-us/"><i class="icon-comment"></i> Contact Us</a></li>
					<li class="divider-vertical"></li>
					<li class="navbar-text" id="welcome">Welcome, <? echo $this->session->userdata('first_name'); ?>!</li>
					<li><a href="/beta/dashboard/main/logout/">Logout</a></li>
				</ul>
	</div>
	<!--/.navbar-inner -->
</div>
<!--/.navbar -->
<? } ?>
</div>