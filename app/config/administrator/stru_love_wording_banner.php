<?php

$conf = StruType::makeEditConf(6);
$conf['query_filter'] = function($query)
{
	 $query->whereTypeId(6);
};

return $conf;