<!-- TOP OF FOOTER -->
		</div><!-- end content_inner_wrapper --> 
	</div><!-- end content_wrapper -->
</div><!-- end wrapper -->
<div id="footer_wrapper"> 
	<div id="footer_inner_wrapper"> 
		<div class="container">
			<p class="muted" id="copy">2012 &#169 Audiebox LLC<br>Having issues with our product? <a href="mailto:parker@audiebox.com" id="email">Email us</a> and let us know!</p>
		</div><!--end container-->
	</div><!-- end footer_inner_wrapper --> 
</div><!-- end footer_wrapper -->  
<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/beta/assets/js/password_strength_plugin.js" type="text/javascript" charset="utf-8"></script>
	<script src="/beta/assets/shadowbox/shadowbox.js" type="text/javascript" charset="utf-8"></script>
	<? if ($this->uri->segment(1) == 'dashboard' AND $this->uri->segment(2) == '') { ?>
	<script src="/beta/assets/jpages/jPages.js"></script>
	<script> 
	$(function() {
	    $("div.holder").jPages({
	        containerID: "feedback_list",
	        perPage: 5
	    });
	});
	</script>
	<? } ?>
	<script>
		// MODAL WINDOW
		Shadowbox.init();
	</script>
	<? if ($this->uri->segment(1) == 'sign-up') { ?>
	<script>
		// BASIC PASSWORD CHECK
		$(".password_test").passStrength({
			userid:	"#username",
			messageloc: 1
		});
		function passwordMatch() {
			$pwd1 = $('#password').val();
			$pwd2 = $('#password_confirm').val();
			if ($pwd1 !== $pwd2) {
				alert('PASSWORDS SHOULD MATCH');
			}
		}
	</script>
	<? } ?>
	<? if ($this->uri->segment(1) == 'dashboard' AND $this->uri->segment(2) == '') { ?>
	<script>
		$('a.show-message').click(function() {
			myID = $(this).attr('rel');
		//	$('a.show-message').hide();
			$("#" + myID).show();
		});
		$('a.hide-message').click(function() {
			myID = $(this).attr('rel');
			$("#" + myID).hide();
		//	$('a.show-message').show();			
		});
	</script>
	<? } ?>
	<? if ($this->uri->segment(1) == 'dashboard' AND $this->uri->segment(2) == 'main' AND $this->uri->segment(3) == 'locations') { ?>
	<script language="javascript" type="text/javascript">
	function limitText(limitField, limitCount, limitNum) {
		if (limitField.value.length > limitNum) {
			limitField.value = limitField.value.substring(0, limitNum);
		} else {
			limitCount.value = limitNum - limitField.value.length;
		}
	}
	function limitTextInit(limitField, limitCount, limitNum) {
		limitField = limitField.val();
		limitCount = limitCount.val();
		limitCount = limitNum - limitField.length;
		$('#countdown').val(limitCount);
	}
	limitTextInit($('#auto_reply'),$('#countdown'),160);
	</script>
		<script src="/beta/assets/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
	<? } ?>
</body>
</html>