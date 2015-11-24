<h1 id="welcome" class="bold-title">Welcome back <? echo $this->session->userdata('first_name'); ?>!</h1>
<br>
<div class="row">
<div class="span2"><h3>Date</h3></div>
<div class="span8"><h3>Feedback</h3></div>
<div class="span2"><h3>Action</h3></div>
</div>
<hr>
<div class="holder"></div>
<hr>
<div id="feedback_list">
<? foreach ($feedback as $message) { ?>
	<div class="row">
		<div class="span2">
			<? echo date("m/d/Y",strtotime($message->created_at)); ?>	
		</div>
		<div class="span8">
		<h4><? echo $message->feedback; ?></h4>
		<? if ($message->reply()) { ?>
			<hr>
			<div>
				<div id="replies<? echo $message->id ?>" style="display:none;">
				<a class="hide-message" rel="replies<? echo $message->id ?>" style="cursor:pointer;">Hide Replies</a>
				<? foreach ($message->reply() as $reply) { ?>
				<div class="alert alert-success"><strong>You replied on <? echo date("m/d/Y",strtotime($reply->created_at)); ?>:</strong> <? echo $reply->reply; ?></div>
				<? } ?>
				</div>	
				<a class="show-message" rel="replies<? echo $message->id ?>" style="cursor:pointer;">See Replies</a>	
			</div>
		<? } ?>
		</div>
		<div class="span2">
			<div class="btn-toolbar">
			<div class="btn-group">
			<a href="/beta/dashboard/main/reply/<? echo $message->id; ?>" rel="shadowbox;height=550;width=700" class="btn btn-info" id="share"><i class="icon-white icon-share-alt"></i> Reply</a>
			</div>
			<div class="btn-group">
			<a href="#" class="btn btn-info disabled" id="del"><i class="icon-white icon-trash"></i> Delete</a>
			</div>
			</div>
		</div>
	</div>
	<hr>
<? } ?>
</div>
<div class="holder"></div>