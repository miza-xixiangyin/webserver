<?php
$conf = StruType::makeEditConf(5);
$conf['query_filter'] = function($query)
{
	 $query->whereTypeId(5);
};

return $conf;