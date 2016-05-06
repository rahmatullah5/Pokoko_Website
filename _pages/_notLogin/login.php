<!DOCTYPE html>
<?php
	if(isset($_COOKIE['uid'])){header("location: pages.php?pages=home");}
?>
<html>
	<head>
		<title>Masuk sebagai Pembeli / Seller!</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="e-commerce, pokoko, TokoOnline, ILoveIndonesia, IndonesianProduct">
		<meta name="description" content="Toko Online Pokoko. Mudah Bayarnya, Aman Belinya dan Terbaik Harganya">
		<meta name="author" content="Fitri Andriyani">
		<link rel='icon' type='../../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/style_main.css">
	</head>

	<body style='height:100vh;background-image:url(../_img/bg-login-2.png)'>
		<div class='c-main-wrapper' style=''>
			<div id='login-1'>
				<div id='login'>
					<form method='post' action='../_plugin/_config/proses.php?p=login' id='main-login'>
						<input type='email' name='user-main-login' placeholder='Email' required>
						<input type='password' name='pass-main-login' placeholder='Password' required>
						<input type='submit' value='Masuk'>
						<p class='c-p-all-10 c-color-pink c-text-a-center'><a href="pages.php?pages=daftar-pembeli">Daftar Sebagai Pembeli</a><b> | </b><a href='pages.php?pages=daftar-seller'>Daftar Sebagai Penjual</a></p>
					</form>
				</div>
			</div>
			<div class='c-clean'></div>
		</div>
	</body>
</html>