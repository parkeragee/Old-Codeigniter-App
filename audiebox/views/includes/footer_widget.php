	</div>
	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/beta/assets/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
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
	limitTextInit($('#reply'),$('#countdown'),160);
	</script>
</body>
</html>