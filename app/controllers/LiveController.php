<?php

class LiveController extends BaseController {

	public function index()
	{
		return View::make('live.index', $this->getPageConfig());
	}
}
