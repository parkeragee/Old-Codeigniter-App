        <!-- section content -->
        <section class="section">
            <div class="row-fluid">
                <!-- span side-left -->
                <div class="span1">
                    <!--side bar-->
                    <aside class="side-left">
                        <ul class="sidebar">
                            <li>
                                <a href="form.html" title="form">                        
                                    <div class="helper-font-24">
                                        <i class="icofont-home"></i>
                                    </div>
                                    <span class="sidebar-text">Locations</span>
                                </a>
                                <ul class="sub-sidebar-form corner-top shadow-white">
                                    <li>
                                        <a href="code_editor.html" title="code editor" class="corner-all">
                                            <i class="icofont-book"></i>
                                            <span class="sidebar-text"><? echo $location->location_name ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>                        
                            <li class="active">
                                <a href="index.html" title="dashboard">
	                                <div class="badge badge-important">3</div>
                                    <div class="helper-font-24">
                                        <i class="icofont-comments"></i>
                                    </div>
                                    <span class="sidebar-text">Messages</span>
                                </a>
                            </li>
                            <li>
                                <a href="interface.html" title="interface">
                                    <div class="helper-font-24">
                                        <i class="icofont-heart"></i>
                                    </div>
                                    <span class="sidebar-text">Favorites</span>
                                </a>
                            </li>
							<li>
                                <a href="charts.html" title="charts">
                                    <div class="helper-font-24">
                                        <i class="icofont-bullhorn"></i>
                                    </div>
                                    <span class="sidebar-text">Campaigns</span>
                                </a>
                            </li>
                            <li>
                                <a href="charts.html" title="charts">
                                    <div class="helper-font-24">
                                        <i class="icofont-bar-chart"></i>
                                    </div>
                                    <span class="sidebar-text">Analytics</span>
                                </a>
                            </li>
                        </ul>
                    </aside><!--/side bar -->
                </div><!-- span side-left -->
                
                <!-- span content -->
                <div class="span11">
                    <!-- content -->
                    <div class="content">
                        <!-- content-header -->
                        <div class="content-header">
                            <h2><? echo $location->location_name ?></h2>
                        </div><!-- /content-header -->
                        
                        <!-- content-body -->
                        <div class="content-body">
                        
                        <!-- ====================================
                        			START MESSAGE INTERFACE
                        	====================================== -->
                        	   <!-- span4-->
                        <div class="message interface">
                            <div class="row-fluid">
                            	<? foreach ($feedback as $message) { ?>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span><? echo date("m/d/Y",strtotime($message->created_at)); ?></span>
                                        </div>
                                        <div class="box-body">
                                            <p><? echo $message->feedback; ?></p>
											<? if ($message->reply()) { ?>
						<? foreach ($message->reply() as $reply) { ?>
							<p id="reply_status">You replied on <? echo date("m/d/Y",strtotime($reply->created_at)); ?> </p>
							<div id="replies<? echo $message->id ?>" style="display:none;">
							<div class="alert alert-success"><? echo $reply->reply; ?></div>
							<? } ?>
							<a class="hide-message" rel="replies<? echo $message->id ?>" style="cursor:pointer;"><span style="color:red">Hide Replies</span></a>
							</div>
							<br><a class="show-message" rel="replies<? echo $message->id ?>" style="cursor:pointer;"><span style="color:#08c">See Replies</span></a>		
						<? } ?>
                                        </div><!-- end box-body -->
                                    </div><!-- end box corner-all -->
                                </div>
                                <? } ?>
                                
                                <!-- 
<div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Hey</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Testing this out</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div><!~~ span4~~>
                                                    	   <!~~ span4~~>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Need to be more specific as to who is texting whom.</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Testing.</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Rico parkeragee@yahoo.com </p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div><!~~ span4~~>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Need to be more specific as to who is texting whom.</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Testing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Rico parkeragee@yahoo.com </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!~~ span4~~>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Hello there little person.</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Lets just type some junk message into this little box and fill up some space in this cool new design that we are trying out.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Testing testing testing on this new new new design</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!~~ span4~~>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Ate some good bass fish tonight for dinner!</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Sitting here listening to my newborn baby scream at the top of his lungs when its bedtime.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>This is some test feedback to check out this new square box design</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!~~ span4~~>                                                                                   
                        	   <!~~ span4~~>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Thank you for praying for my family through this hard time.</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div><!~~ end box-body ~~>
                                    </div><!~~ end box corner-all ~~>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Hey</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Testing this out</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div><!~~ span4~~>
                                                    	   <!~~ span4~~>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Need to be more specific as to who is texting whom.</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Testing.</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Rico parkeragee@yahoo.com </p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div><!~~ span4~~>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Need to be more specific as to who is texting whom.</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Testing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Rico parkeragee@yahoo.com </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!~~ span4~~>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Hello there little person.</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Lets just type some junk message into this little box and fill up some space in this cool new design that we are trying out.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Testing testing testing on this new new new design</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!~~ span4~~>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Ate some good bass fish tonight for dinner!</p>
                                            <p><a href="#" style="color:rgb(46,142,194)">View replies</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>Sitting here listening to my newborn baby scream at the top of his lungs when its bedtime.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a href="#myModal" role="button" data-toggle="modal" style="color:rgb(46,142,194)">Reply</a>
                                            </div>
                                            <span>10/13/2012</span>
                                        </div>
                                        <div class="box-body">
                                            <p>This is some test feedback to check out this new square box design</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!~~ span4~~>   
 -->
							<!-- =================================
                        			END MESSAGE INTERFACE
                        	================================== -->
                        </div><!-- end message interface -->                       
                                     <!-- =========================================
                                                        MODAL
                                    =========================================== -->            
                                                    <!-- Modal -->
                                                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h3 id="myModalLabel">Reply to message</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Original message:</strong></p>
                                                            <p>Thank you for praying for my family through this hard time.</p>
                                                            <p><strong>Your reply:</strong></p>
                                                            <textarea name="message-writer" class="input-block-level" placeholder="write message here..."></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                            <button class="btn btn-primary">Send Reply</button>
                                                        </div>
                                                    </div>
                            
                            <!--/interface-->
                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->
            </div>
        </section>

        <!-- section footer -->
        <footer>
            <a rel="to-top" href="#top"><i class="icofont-circle-arrow-up"></i></a>
        </footer>

        <!-- javascript
        ================================================== -->
<!--         <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script> -->
        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui.min.js"></script> <!-- this for sliders-->
        <script src="js/bootstrap.min.js"></script>
<!--         <script src="js/uniform/jquery.uniform.js"></script> -->
        
<!-- 
        <script src="js/pnotify/jquery.pnotify.js"></script>
        <script src="js/pnotify/jquery.pnotify.demo.js"></script>
        <script src="js/responsive-tables/responsive-tables.js"></script>
 -->

        <!-- required stilearn template js, for full feature-->
        <script src="js/holder.js"></script>
        <script src="js/stilearn-base.js"></script>

        <script type="text/javascript">
            
            $(document).ready(function() {
                // try your code here..
                
                // uniform
                $('[data-form=uniform]').uniform();
                // tooltip demo
                $('.tooltip-demo').tooltip({
                    selector: "a[rel=tooltip]"
                }).css({'margin-bottom' : '20px'})
                // popover demo
                $("a[rel=popover]").popover().click(function(e) {
                    e.preventDefault()
                })
                
                // slider simple
                // this setting slider on sidebar right
                $('[data-side=slider]').slider({
                    orientation: "horizontal",
                    range: "min",
                    max: 300
                }).each(function(){
                    value = $(this).attr('data-value');

                    $(this).slider('value', value).css({
                        'margin-bottom' : '8px'
                    });
                });
                // this setting slider vertical on sidebar right
                $('[data-side=slider-vertical]').slider({
                    orientation: "vertical",
                    range: "min",
                    max: 300
                }).each(function(){
                    value = $(this).attr('data-value');

                    $(this).slider('value', value).css({
                        'display':'inline-block',
                        'margin-right' : '20px',
                        'height' : '200px'
                    });
                });
                
                // default slider
                $("#slider-simple").slider();

                // slider range
                $("#slider-range").slider({
                    range: true,
                    min: 0,
                    max: 500,
                    values: [ 75, 300 ],
                    slide: function( event, ui ) {
                        $( "#amount-range" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                    }
                });
                $( "#amount-range" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

                // slider with min
                $("#slider-min").slider({
                        range: "min",
                        value: 37,
                        min: 10,
                        max: 700,
                        slide: function( event, ui ) {
                            $( "#amount-min" ).val( "$" + ui.value );
                        }
                    });
                    $( "#amount-min" ).val( "$" + $( "#slider-min" ).slider( "value" ) );

                // slider with max
                $("#slider-max").slider({
                    range: "max",
                    min: 1,
                    max: 100,
                    value: 20,
                    slide: function( event, ui ) {
                        $( "#amount-max" ).val( ui.value );
                    }
                });
                $( "#amount-max" ).val( $( "#slider-max" ).slider( "value" ) );

                // slider vertical
                $('.slider-vertical').slider({
                    orientation: "vertical",
                    range: "min",
                    min: 1,
                    max: 250
                }).each(function(){
                    value = $(this).attr('data-value');

                    $(this).slider('value', value).css({
                        'display':'inline-block',
                        'margin-right' : '20px',
                        'height' : '200px'
                    });
                })

                // demo slider colors
                $('.demo-colors').slider({
                    range: true,
                    min: 0,
                    max: 500,
                    values: [ 75, 300 ]
                });
                
            });
      
        </script>
    </body>
</html>
