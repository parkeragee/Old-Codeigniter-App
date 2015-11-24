<div class="container">
	<div class="keywords">
	<p>Create new campaign</p>
	<form action="/beta/dashboard/main/create_campaign/" method="post">
		<input type="text" name="campaign" id="campaign" placeholder="Campaign Keyword"><br>
		<input type="submit" class="btn btn-info" value="Start Campaign">
	</form>
		<ul>
		<?php foreach ($campaign as $c){ ?>
			<li><a href="/beta/dashboard/main/campaign/"><?php echo $c->campaign ?></a></li>
		</ul>
		<?php } ?>
	</div><!-- end keywords -->
</div><!-- end container -->









