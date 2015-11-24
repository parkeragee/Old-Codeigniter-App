<h1 id="welcome" class="bold-title">Welcome back <? echo $this->session->userdata('first_name'); ?>!</h1>
<br>
<table class="table table-hover table-bordered">
	<tr>
		<th width="10%">Date</th>
		<th width="70%">Feedback</th>
		<th width="20%">Action</th>
	</tr>
<? foreach ($feedback as $message) { ?>
	<tr>
		<td><? echo date("m/d/Y",strtotime($message->created_at)); ?></td>
		<td>
			<h3><? echo $message->feedback; ?></h3>
			<? if ($message->reply()) { ?>
			<br>
			<div>
				<a class="show-message" rel="replies<? echo $message->id ?>" style="cursor:pointer;">See Replies</a>
				<div id="replies<? echo $message->id ?>" style="display:none;">
				<? foreach ($message->reply() as $reply) { ?>
				<div class="alert alert-success"><strong>You replied on <? echo date("m/d/Y",strtotime($reply->created_at)); ?>:</strong> <? echo $reply->reply; ?></div>
				<? } ?>
				<a class="hide-message" rel="replies<? echo $message->id ?>" style="cursor:pointer;">Hide Replies</a>
				</div>		
			</div>
			<? } ?>
		</td>
		<td><div class="btn-toolbar">
  			<div class="btn-group">
     				 <a href="/beta/dashboard/main/reply/<? echo $message->id; ?>" rel="shadowbox;height=550;width=700" class="btn btn-info" id="share"><i class="icon-white icon-share-alt"></i> Reply</a>
  </div>
  <div class="btn-group">
      <a href="#" class="btn btn-info disabled" id="del"><i class="icon-white icon-trash"></i> Delete</a>
  </div>
</div></td>
	</tr>
<? } ?>
</table>