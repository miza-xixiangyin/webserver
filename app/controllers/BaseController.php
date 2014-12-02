<?php

class BaseController extends Controller {

	public function __construct()
    {
        // $this->page_conf = $this->getPageConfig();
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}


	// public function getPageConfig()
	// {
	// 	$cache_conf = Config::get('web_conf.cache_page_conf');
	// 	// Cache::forget($cache_conf['name']);
	// 	$page_conf = Cache::remember($cache_conf['name'], $cache_conf['expire'], function () {
	// 		$conf_data = array();
	// 		// get top menu list
	// 		$menu_list = DB::table('stru_columns')
	// 						->join('stru_types', 'stru_columns.type_id', '=', 'stru_types.id')
	// 						->select(
	// 							'stru_columns.*',
	// 							'stru_types.allow_num',
	// 							'stru_types.tag_name',
	// 							'stru_types.need_name',
	// 							'stru_types.need_pic',
	// 							'stru_types.need_text',
	// 							'stru_types.need_text_extral_1',
	// 							'stru_types.need_text_extral_2',
	// 							'stru_types.need_link')
	// 						->where('type_id', '!=', '0')
	// 						->orderBy('type_id', 'asc')
	// 						->orderBy('order', 'asc')
	// 						->get();

	// 		foreach ($menu_list as $row) {
	// 			$conf_item 	= array();
	// 			$tag 		= $row->tag_name;

	// 			if ($row->need_pic) 			$conf_item['pic'] 		= $row->pic;
	// 			if ($row->need_text) 			$conf_item['text_1'] 	= $row->text;
	// 			if ($row->need_text_extral_1) 	$conf_item['text_2'] 	= $row->text_extral_1;
	// 			if ($row->need_text_extral_2) 	$conf_item['text_3'] 	= $row->text_extral_2;
	// 			if ($row->need_link) 			$conf_item['link'] 		= $row->link;

	// 			if (!isset($conf_data[$tag])) $conf_data[$tag] = array();
	// 			if ($row->allow_num == 1) {
	// 				$conf_data[$tag] = $conf_item;
	// 			}
	// 			else if ($row->need_name) {
	// 				$conf_data[$tag][$row->name] = $conf_item;
	// 			}
	// 			else {
	// 				$conf_data[$tag][] = $conf_item;
	// 			}
	// 		}

	// 		return $conf_data;
	// 	});

	// 	return $page_conf;
	// }
}
