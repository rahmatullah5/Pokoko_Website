<!DOCTYPE html>
<?php
	if(isset($_COOKIE['uid'])){header("location: pages.php?pages=home");}
?>
<html>
	<head>
		<title>Daftar sebagai Penjual / Seller!</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="e-commerce, pokoko, TokoOnline, ILoveIndonesia, IndonesianProduct,JadiPenjualDiPokoko,">
		<meta name="description" content="Toko Online Pokoko. Mudah Bayarnya, Aman Belinya dan Terbaik Harganya">
		<meta name="author" content="Fitri Andriyani">
		<link rel='icon' type='../../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/style_main.css">
	</head>
	<body style='height:100vh;'>
		<div class='c-main-wrapper c-back-light' align='center' style='border-bottom:5px solid #01c3df;'>
			<div class='c-wrapper-10' style='height:75px;'>
				<a href="pages.php?pages=home"><img src="../_img/logo-pokoko-panjang-2.png" class='c-f-left' style='height:60px;margin-top:5px;'></a>
				<div id='down-app-1' style='margin-top:5px;'><img src="../_img/get-it-on-google-play-1.png"></div>
				<div class='c-clean'></div>	
			</div>
			
			<div class='c-clean'></div>
		</div>

		<div class='c-main-wrapper' align='center' style='margin-top:20px;'>
			<div class='c-wrapper-10'>
				<div class='c-left-side-10 c-b-a-light-grey'>
					<p class='c-font-bell c-font-15 c-text-a-left' style='padding-left:20px;padding-bottom:10px;border-bottom:1px solid #cecece;width:680px;'>Daftar Sebagai Penjual Di Pokoko</p>
					<div id='form-d-p'>
						<form method='post' action='../_plugin/_config/proses.php?p=daftar-seller'>
							<div class='form-d-p-item'>
								<p>Alamat E-mail<span class='c-color-pink'>*</span></p>
								<input type='email' name='user-d-p' required>
							</div>
							<div class='form-d-p-item'>
								<p>Password<span class='c-color-pink'>*</span></p>
								<input type='password' name='pass-d-p' required>
							</div>
							<div class='form-d-p-item'>
								<p></p>
								<input type='submit' value='Daftar!'>
								<a href="pages.php?pages=login"><input type='button' value='Saya sudah memiliki akun'></a>
							</div>
						</form>
						<p class='c-color-pink c-text-a-left'>Tanda bintang <b>(*)</b> wajib diisi</p>
						<p class='c-f-left' id='jual'><a href='pages.php?pages=daftar-pembeli' class='c-color-light'>Daftar Sebagai Pembeli</a></p>
					</div>
					<div class='c-clean'></div>	
				</div>
				<div class='c-right-side-10' style='height:360px;'>
					<div id='right-side-promo'>
						<div id='title-rsp'><p>jualan itu gak ribet</p></div>
						<div id='content-rsp'>
							<ul id='ul-rsp'  class='c-b-l-light-grey'>
								<li>
									<img src="../_img/icon/cod-icon-small.png">
									<p>Biaya pungutan kecil</p>
								</li>
								<li>
									<img src="../_img/icon/free-ongkir-icon-small.png">
									<p>Sistem rekening bersama</p>
								</li>
								<li>
									<img src="../_img/icon/perlindungan-icon-small.png">
									<p>Sistem Pokoko Pay</p>
								</li>
								<li>
									<img src="../_img/icon/customer-service-icon-small.png">
									<p>Layanan Penjual</p>
								</li>
								<a href="" class='c-trans-smooth c-hov-underline c-color-dark-blue'><p  class='c-color-dark-blue c-text-a-left' style='margin:0px 0px 15px 10px'>Selengkapnya</p></a>
							</ul>
							<a href="">
								<div class='c-news-280'>
									<p style='margin:10px 0px 10px 0px'>Hubungi 089689921363 untuk pemasangan iklan</p>
									<a href="">Atau klik disini untuk memasang iklan</a>
								</div>
							</a>
							<div class='c-clean'></div>
						</div>
						<div class='c-clean'></div>		
					</div>
					<div class='c-clean'></div>	
				</div>
				<div class='c-clean'></div>	
			</div>
			<div class='c-wrapper-10 c-back-grey' style='margin-top:10px;height:100px;'>
				<p class='c-font-15'>Hubungi 089689921363 untuk pemasangan Iklan</p>
				<p class='c-font-15'>atau</p>
				<a href="" class='c-hov-underline c-trans-smooth'><p class='c-font-15'>Klik disini untuk pemasangan iklan</p></a>
			</div>
			<div class='c-wrapper-10' style='border-top:1px solid #cecece;margin-top:10px;padding-top:10px'>
				<p>Butuh Bantuan? Hubungi 022-9382172</p>
				<p style='margin-top:10px;'>&copy; All Rights Reserved | Pokoko Co. 2015</p>
			</div>
		</div>
		<!--<div id='daftar-beli'></div>-->
	</body>
</html>