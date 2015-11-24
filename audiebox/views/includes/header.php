<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Interface - Stilearn Admin Bootstrap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="stilearn admin template v1.0">
        <meta name="author" content="stilearning">

        <!-- google font -->
        <link href="http://fonts.googleapis.com/css?family=Aclonica:regular" rel="stylesheet" type="text/css" />

        <!-- styles -->
        <link href="/beta/assets/css/bootstrap.css" rel="stylesheet">
        <link href="/beta/assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="/beta/assets/css/stilearn.css" rel="stylesheet">
        <link href="/beta/assets/css/stilearn-responsive.css" rel="stylesheet">
        <link href="/beta/assets/css/stilearn-helper.css" rel="stylesheet">
        <link href="/beta/assets/css/stilearn-icon.css" rel="stylesheet">
        <link href="/beta/assets/css/animate.css" rel="stylesheet">
        <link href="/beta/assets/css/uniform.default.css" rel="stylesheet">
        
        <link href="/beta/assets/css/jquery.pnotify.default.css" rel="stylesheet">
        <link href="/beta/assets/css/responsive-tables.css" rel="stylesheet">
        <link href="/beta/assets/css/font-awesome.css" rel="stylesheet">
        <link href="/beta/assets/css/picons-oxygen.css" rel="stylesheet">
        
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>
    <? if ($this->session->userdata('logged_in')) { ?>
        <!-- section header -->
        <header class="header" data-spy="affix" data-offset-top="0">
            <!--nav bar helper-->
            <div class="navbar-helper">
                <div class="row-fluid">
                    <!--panel site-name-->
                    <div class="span2">
                        <div class="panel-sitename">
                            <h2><a href="/beta/dashboard/"><span class="color-teal"><img src="/Users/parkeragee/Desktop/index.png"></a></h2>
                        </div>
                    </div>
                    <!--/panel name-->

                    <div class="span6">
                        <!--panel search-->
                        <div class="panel-search">
                            <form>
                                <div class="input-icon-append">
                                    <button type="submit" rel="tooltip-bottom" title="search" class="icon"><i class="icofont-search"></i></button>
                                    <input class="input-large search-query grd-white" maxlength="23" placeholder="Search here..." type="text">
                                </div>
                            </form>
                        </div><!--/panel search-->
                    </div>
                    <div class="span4">
                        <!--panel button ext-->
                        <div class="panel-ext">
                            <div class="btn-group user-group">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <img class="corner-all" align="middle" src="/beta/assets/img/user-thumb.jpg" title="John Doe" alt="john doe" /> <!--this for display on PC device-->
                                    <button class="btn btn-small btn-inverse">Parker Agee</button> <!--this for display on tablet and phone device-->
                                </a>
                                <ul class="dropdown-menu dropdown-user" role="menu" aria-labelledby="dLabel">
                                    <li>
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="img-circle" src="img/user.jpg" title="profile" alt="profile" />
                                            </a>
                                            <div class="media-body description">
                                                <p><strong>Parker Agee</strong></p>
                                                <p class="muted">parker@audiebox.com</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown-footer">
                                        <div>
                                            <a class="btn btn-small pull-right" href="/beta/dashboard/main/logout/">Logout</a>
                                            <a class="btn btn-small" href="/beta/dashboard/main/locations/">Settings</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!--panel button ext-->
                    </div>
                </div>
            </div><!--/nav bar helper-->
            <? } ?>
        </header>