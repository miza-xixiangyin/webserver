<?php

class ConColumn extends Eloquent {

	protected $table = 'con_columns';

	public static $rules = array
	(
		'name' => 'required|unique:con_columns',
		'desc' => 'required',
	);

	public static function columnsList()
	{
		$cache_conf = Config::get('web_conf.cache_page_column_conf');
		$data = Cache::remember($cache_conf['name'], $cache_conf['expire'], function () {
			$columns = ConColumn::all();
			$cache_data = array();
			foreach ($columns as $key => $column) {
				$cache_data[$column->name] = $column->id;
			}
			return $cache_data;
		});

		return $data;
	}
}