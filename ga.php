<?php


$GA = "XX-XXXXXXXX-X"; // insert your Google Analytics ID Here


if (isset($_COOKIE['RGB-Color'])) {
  $sessid = $_COOKIE['RGB-Color'];
} else {
	$cookie_name = 'RGB-Color';
	$cookie_value = ''.rand(100,255).'-'.rand(100,255).'-'.rand(100,255).'';
	setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
	$sessid = $cookie_value;
};


if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$ip = $_SERVER['REMOTE_ADDR'];
};


$ua = urlencode($_SERVER['HTTP_USER_AGENT']);


$dp = (basename($_SERVER['PHP_SELF']));


if (!empty($_SERVER['HTTP_REFERER'])) {
	$ref = $_SERVER['HTTP_REFERER'];
} else {
	$ref = '';
};

$url = 'https://www.google-analytics.com/collect?v=1&t=pageview&tid='.$GA.'&cid='.$sessid.'&uip='.$ip.'&ua='.$ua.'&dp='.$dp.'&dr='.$ref;
file_get_contents($url);

?>
