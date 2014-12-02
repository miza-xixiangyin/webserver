<?php
/**
* send sms
*/
class SMS
{
	private static $sms_url = 'http://utf8.sms.webchinese.cn/?Uid=zhang096608&Key=c5c5e9ca8025cd9ab4a0';

	function __construct()
	{
		# code...
	}

	public static function sendMsg ($mob, $text)
	{
		$url = self::$sms_url . '&smsMob=' . $mob . '&smsText=' . $text;
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);

		if ($file_contents < 1) {
			return false;
		}
		return true;
	}
}
?>