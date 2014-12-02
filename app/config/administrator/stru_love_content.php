<?php
$conf = StruType::makeEditConf(4);
$conf['query_filter'] = function($query)
{
	$query->whereTypeId(4);
};
// $conf['edit_fields']['pic']['upload_url'] = 'http://115.28.246.214:8883/admin/stru_love_content/pic/file_upload?sssss=3';
return $conf;