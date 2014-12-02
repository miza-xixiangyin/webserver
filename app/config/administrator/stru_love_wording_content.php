<?php
$conf = StruType::makeEditConf(7);
$conf['action_permissions'] = array();
$conf['query_filter'] = function($query)
{
	 $query->whereTypeId(7);
};

return $conf;