<?php

class StoreController extends BaseController {

	public function index()
	{
		$page = ConPage::find(5);
		return View::make('store.index', array('page_content' => $page));
	}
}