<?php

class ShortController extends BaseController {

	public function index($id)
	{
		$data = PageShort::where('key', '=', $id)->first();
		if ($data) {
			echo $data->value;
		} else {
			echo 222;
		}
	}

	public function make()
	{
		// $shorts = PageShort::where('status', '=', '1')->where('id', '>', '500')->get();
		// foreach ($shorts as $key => $short) {
		// 	$path = public_path() . '/uploads/qr/501_1000/' . $short->key . '.jpg';
		// 	if (!file_exists($path)) {
		// 		// $short->status=0;
		// 		// $short->save();
		// 		echo $path, "<br />";
		// 	}
		// }
		// exit();

		$shorts = PageShort::where('status', '=', '0')->paginate(10);
		// foreach ($shorts as $key => $short) {
			$short = PageShort::find(1);
			PageShort::makeQRcode($short);
			echo '<image style="display: block; width: 100%;" src="/uploads/qr/' . $short->key . '.jpg" />';
			// $short->status=1;
			$short->save();
		// }
		exit();

		// for ($i=1; $i < 10001; $i++) {
		// 	$url = 'http://xixiangyin.cn/postcard/' . md5($i);
		// 	$key = PageShort::makeShortName($url);
		// 	$short = new PageShort;
		// 	$short->key = $key;
		// 	$short->value = $url;
		// 	$short->pwd = PageShort::makeShortName(rand(0,99999999999));
		// 	$short->save();
		// }
	}

	public function postcard($id)
	{
		echo $id;
	}
}