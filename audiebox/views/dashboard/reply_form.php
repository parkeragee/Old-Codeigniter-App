<h1 class="reply">Reply to Feedback</h1>
<hr>
<h2>Customer Feedback</h2>
<? if ($error !== '') { ?>
	<div class="alert"><? echo $error; ?></div>
<? } ?>
<div class="well"><? echo $feedback->feedback; ?></div>
<h2>Your Reply</h2>
<form action="/beta/dashboard/main/reply/<? echo $feedback_id; ?>" method="post" id="replyform" autocomplete="off">
	<textarea id="reply" name="reply" rows="4" class="input-xxlarge" autofocus="autofocus" onKeyDown="limitText(this.form.reply,this.form.countdown,160);" 
onKeyUp="limitText(this.form.reply,this.form.countdown,160);"></textarea>
	<p>You have <input readonly type="text" id="countdown" name="countdown" size="3" value="160"> characters left.</p>
	<hr>
	<button class="btn btn-success">Send Reply</button>
</form>