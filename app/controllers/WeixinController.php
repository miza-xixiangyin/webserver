<?php

class WeixinController extends BaseController {

	public function index()
	{
		$all = Weixin::all();
		foreach ($all as $key => $row) {
			$all[$key]->content = str_replace("\n", "<br />", $row->content);
		}
		return View::make('weixin.index')->with('data', $all);
	}

	public function listContent()
	{
		$all = Weixin::all();
		foreach ($all as $key => $row) {
			$all[$key]->content = str_replace("\n", "<br />", $row->content);
			$all[$key]->time = substr($all[$key]->created_at, 0, 10);
		}
		return View::make('weixin.list')->with('data', $all);
	}

	public function newContent()
	{
		return View::make('weixin.new');
	}

	public function content($id)
	{
		$content = Weixin::find($id);
		if (!$content) {
			return Redirect::route("m_weixin");
		}
		$content->content = str_replace("\n", "<br />", $content->content);
		$content->time = substr($content->created_at, 0, 10);
		return View::make('weixin.content')->with('content', $content);
	}

	public function remove($id)
	{
		$content = Weixin::find($id);
		$content->delete();
		return Redirect::route("m_weixin_admin")->with('success', '删除成功');
	}

	public function doAddNew()
	{
		$rules = array(
			"title" 	=> "required",
			"content" 	=> "required",
			'image'     => 'required|image'
			);

		$messages = array(
			"title.required" 	=> "标题不能为空",
			"content.required" 	=> "内容不能为空"
			);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->passes()) {

			$file = Input::file('image');
			$destinationPath = 'uploads/';
			$filename = str_random(12) . '.' . $file->getClientOriginalExtension();
			$upload_success = $file->move($destinationPath, $filename);

			$weixin = new Weixin;
			$weixin->title = Input::get("title");
			$weixin->content = Input::get("content");
			$weixin->pic = $filename;
			$weixin->save();
			return Redirect::route("m_weixin_new")->with('success', '发布成功,请继续发布');
		} else {
			return Redirect::route("m_weixin_new")->withInput()->withErrors($validator);
		}
	}
}
