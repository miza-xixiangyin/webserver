<!doctype html>
<html lang="cn">
<head>
	<meta charset="utf-8"/>

	<title>{{ Lang::get('msg.page_title') }}</title>
	<meta name="description" content="{{ Lang::get('msg.page_desc') }}"/>
	<meta name="author" content="{{ Lang::get('msg.page_author') }}"/>

	<link rel="shortcut icon" href="favicon.ico" />

	<!-- mobile viewport optimisation -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="renderer" content="webkit">
	<meta property="qc:admins" content="25505551141167116636" />
</head>
<body>
<span id="qqLoginBtn"></span>
<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101152239" charset="utf-8"></script>
<script type="text/javascript">
    QC.Login({
       btnId:"qqLoginBtn"    //插入按钮的节点id
});
</script>
</body>
</html>