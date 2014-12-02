<?php

class InfoController extends BaseController {

	public function index()
	{
		$route_name = Route::currentRouteName();
		return View::make('info.' . $route_name);
	}
}
