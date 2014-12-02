<?php

class HomeController extends BaseController {

	public function index()
	{
		return View::make('home.index');
	}

	public function sms()
	{
		// $address = array("81228741@qq.com", "zhang096608@gmail.com");
		// foreach ($address as $value) {
		// 	Mail::queue('mail.verse', $this->getPageConfig(), function ($message) use ($value)
		// 	{
		// 		$message->to($value)->subject('西厢印发来的一首诗');

		// 	});
		// }

		return View::make('mail.verse');
	}
}