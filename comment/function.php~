<?php
/*
+----------------------------------------------------------------------------+
|     Copyright (c) 2008-2009 by al farisi
|     Website : www.alfarisi.web.id
|               www.indokreatif.net
|     E-mail  : el.numinous@gmail.com
+----------------------------------------------------------------------------+
*/

function sql_connect($dbhost, $dbuser, $dbpass, $dbname) {
	$dbconn = mysql_connect($dbhost, $dbuser, $dbpass);
	if($dbconn) {
		$dbselect = mysql_select_db($dbname);
		if(!$dbselect) {
			mysql_close($dbconn);
			$dbconn = false;
		}
	}
	return $dbconn;
}

function check_email($email) {
	return preg_match("/^([_a-zA-Z0-9-+]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+)(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,6})$/" , $email) ? $email : FALSE;
}

function create_code() {
	$temp = explode(" ", microtime());
	$recnum = str_replace(".", "", $temp[1].$temp[0]);
	
	$rcode = hexdec(md5($recnum));
	$code = substr($rcode, 2, 6);
	
	$_SESSION['tmp']['captcha'][0] = $recnum;
	$_SESSION['tmp']['captcha'][1] = $code;
	
	return array($recnum, $code);
}

function verify_code($rec_num, $checkstr) {
	if ($_SESSION['tmp']['captcha'][0] == $rec_num) {
		$code = $_SESSION['tmp']['captcha'][1];
		$_SESSION['tmp']['captcha'] = '';
		return ($checkstr == $code);
	}
	return FALSE;
}

?>