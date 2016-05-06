<?php
	if(!isset($_COOKIE['pernah'])){
		$a="Ya";
		$b="pernah";
		setcookie($b, $a, time() + 60 * 60 * 24 * 30 * 3,"/");
		header("location:_pages/landing.php");
	} else{
		header("location:_pages/pages.php?pages=home");
	}
?>