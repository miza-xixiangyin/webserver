<?php
$conf = StruType::makeEditConf(3);
$conf['query_filter'] = function($query)
{
	 $query->whereTypeId(3);
};

return $conf;