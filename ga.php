<?php

$GA = "XX-XXXXXXXX-X"

$current_slug_1 = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
$current_slug_2 = explode('?' , $current_slug_1);
$current_slug = reset($current_slug_2);

$n1 = (basename($_SERVER['PHP_SELF']));
$n0 = (basename($_SERVER['PHP_SELF'], '.php'));
$n2 = str_replace('.php', '', $_SERVER['PHP_SELF']);
$n3 = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
$s0     = $_SERVER['HTTP_HOST'];
$script   = str_replace('.html', '', $_SERVER['SCRIPT_NAME']);
$n4   = $_SERVER['QUERY_STRING'];
if ($n4=="")
$s2 = $n3 . '://' . $s0 . $script;
else
$s2 = $n3 . '://' . $s0 . $script . '?' . $n4;
$s1 = $n3 . '://' . $s0;

$lang0 = str_replace($n0, '', $script);
$lang = 'en';

$page_code = '1';



if (isset($_COOKIE['RGB-Color'])) {
  $sessid = $_COOKIE['RGB-Color'];
} else {
	$cookie_name = 'RGB-Color';
	$cookie_value = ''.rand(100,255).'-'.rand(100,255).'-'.rand(100,255).'';
	setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
	$sessid = $cookie_value;
};

$ip = '';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$ip = $_SERVER['REMOTE_ADDR'];
};

$ua = urlencode($_SERVER['HTTP_USER_AGENT']);

$ref = '';
if (!empty($_SERVER['HTTP_REFERER'])) {
	$ref = $_SERVER['HTTP_REFERER'];
};

$url = 'https://www.google-analytics.com/collect?v=1&t=pageview&tid='.$GA.'&cid='.$sessid.'&uip='.$ip.'&ua='.$ua.'&dp='.$n0.'&dr='.$ref;
file_get_contents($url);

?>
