<?php

$conf = StruType::makeEditConf(1);
$conf['action_permissions'] = array();
$conf['query_filter'] = function($query)
{
	 $query->whereTypeId(1);
};
// $conf['edit_fields']['pic']['sizes'] = array();
// $conf['edit_fields']['pic']['sizes'][] = array(120, 120, 'crop', public_path() . '/uploads/columns/w-120/', 100);

return $conf;