<?php
	mysql_connect("localhost","root","");
	mysql_select_db("db_pokoko_4");
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$psid=session_id();
?>