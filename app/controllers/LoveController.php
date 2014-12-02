<?php

class LoveController extends BaseController {

	public function index()
	{
		return View::make('love.index', $this->getPageConfig());
	}

	public function article()
	{
		return View::make('love.article', $this->getPageConfig());
	}

	public function postLove()
	{
		return View::make('love.post_love', $this->getPageConfig());
	}

	public function LoveSelf()
	{
		return View::make('love.love_self', $this->getPageConfig());
	}
}
