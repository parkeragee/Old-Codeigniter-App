<div class="container dashboard">
  <div class="row">
    <div class="span2" id="sidebar">
    	<div class="favorites">
    		<h1>Favorites</h1>
    		<a href="/beta/dashboard/main/campaigns/" data-toggle="modal">Campaigns</a>
    	</div><!-- end favorites -->
      <!--Sidebar content-->
    </div><!-- end span2 -->
    <div class="span10" id="feedback_table">
    <form action="/beta/dashboard/main/search_campaigns/" method="post" class="search_form pull-right">
    	<input type="text" name="search_term" id="search_term" placeholder="Search terms">
    	<input type="submit" class="btn" value="Search">
    </form>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="10%">Date</th>
					<th width="70%">Feedback</th>
					<th width="20%">Action</th>
				</tr>
			</thead>
			<tbody id="feedback_list">
			<? foreach ($feedback as $message) { ?>
				<tr>
					<td><? echo date("m/d/Y",strtotime($message->created_at)); ?></td>
					<td>
						<strong style="font-size:16px;"><? echo $message->feedback; ?></strong>
						<? if ($message->reply()) { ?>
						<? foreach ($message->reply() as $reply) { ?>
							<p id="reply_status">You replied on <? echo date("m/d/Y",strtotime($reply->created_at)); ?> </p>
							<div id="replies<? echo $message->id ?>" style="display:none;">
							<div class="alert alert-success"><? echo $reply->reply; ?></div>
							<? } ?>
							<a class="hide-message" rel="replies<? echo $message->id ?>" style="cursor:pointer;">Hide Replies</a>
							</div>
							<br><a class="show-message" rel="replies<? echo $message->id ?>" style="cursor:pointer;">See Replies</a>		
						<? } ?>
					</td>
					<td id="reply_cell">
						<a href="/beta/dashboard/main/reply/<? echo $message->id; ?>" rel="shadowbox;height=550;width=700" class="btn btn-small btn-info" id="share"><i class="icon-white icon-share-alt"></i> Reply</a>&nbsp;&nbsp;
					</td>
					<td id="delete_cell">
						<a href="#"> Delete</a>
					</td>
				</tr>
			<? } ?>
			</tbody>
		</table>
		<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Modal header</h3>
</div>
<div class="modal-body">
<p>One fine body…</p>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-primary">Save changes</button>
</div>
</div>
    </div><!-- end span10 -->
  </div><!-- end row-fluid -->
</div><!-- end container-fluid -->









