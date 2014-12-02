<?php

class ContentController extends BaseController {

	private static function checkPageExist($model, $page_id = '')
	{
		$columns = ConColumn::columnsList();
		if (!isset($columns[$model]))
		{
			return null;
		}
		$column_id = $columns[$model];

		if (!$page_id)
		{
			$page = ConPage::where('column_id', '=', $column_id)
					->orderBy('weight', 'DESC')
					->first();
		}
		else
		{
			$page = ConPage::find($page_id);
		}

		if (!$page)
		{
			return null;
		}

		if ($page->column_id != $column_id)
		{
			return null;
		}

		return $page;
	}

	public function pageContent($model, $id = '')
	{
		$page = self::checkPageExist($model, $id);

		if (!$page)
		{
			return Redirect::route('index');
		}

		// add comment
		if (Request::isMethod('post') && Input::has('comment'))
		{
			$comment_content = trim(Input::get('comment'));
			$redirect = Redirect::route('page_content', array(
				'model' => $model,
				'id' => $id
			));
			if (!$comment_content)
			{
				return $redirect;
			}

			$comment = new ConComment();
			$comment->page_id = $page->id;
			$comment->user_id = Auth::user()->id;
			$comment->content = $comment_content;
			$comment->save();
			return $redirect;
		}

		return View::make('page_content.' . $model, array('page_content' => $page));
	}

	public function post()
	{
		return View::make('page_content.post');
	}

	public function contentAdmin($id)
	{
		$page = ConPage::find($id);

		if (!$page)
		{
			return Redirect::route('index');
		}

		if (Request::isMethod('post'))
		{
			$content = Input::get('content');
			$page->content = $content;
			$page->save();
			return array();
		}

		return View::make('page_content.page_admin', array('page_content' => $page));
	}
}
