<?php
$conf = StruType::makeEditConf(2);
$conf['query_filter'] = function($query)
{
	 $query->whereTypeId(2);
};
$conf['edit_fields']['name']['editable'] = false;

return $conf;