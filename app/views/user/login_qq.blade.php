<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101152239" data-redirecturi="http://www.xixiangyin.cn/profile/10" charset="utf-8"></script>
<script type="text/javascript">
	QC.Login.getMe(function(openId, accessToken){
		$.ajax({
			url: location.href,
			type: 'POST',
			dataType: 'json',
			data: {
				openId: openId,
				accessToken: accessToken
			}
		})
		.always(function() {
			window.opener.location.reload();
			window.close();
		});
	});
</script>