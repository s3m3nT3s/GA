<?php

$GA = "XX-XXXXXXXX-X"; // insert your Google Analytics ID Here

if (isset($_COOKIE['GA'])) {
  $sessid = $_COOKIE['GA'];
} else {
	$cookie_name = 'GA';
	$cookie_value = mt_rand(100000,999999);
	setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
	$sessid = $cookie_value;
};

$uip = urlencode($_SERVER['REMOTE_ADDR']);
$ua = urlencode($_SERVER['HTTP_USER_AGENT']);
$dp = urlencode(basename($_SERVER['PHP_SELF']));
$ref = urlencode($_SERVER['HTTP_REFERER']);
$cid = md5($sessid.$ip.$ua);

$url = 'https://www.google-analytics.com/collect?v=1&t=pageview&tid='.$GA.'&cid='.$sessid.'&uip='.$ip.'&ua='.$ua.'&dp='.$dp.'&dr='.$ref;
file_get_contents($url);

?>
