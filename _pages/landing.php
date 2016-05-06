<!DOCTYPE html>
<html lang="en" class="no-js">
<html>
	<head>
		<title>Selamat datang di Pokoko!</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="e-commerce, pokoko, TokoOnline, ILoveIndonesia, IndonesianProduct">
		<meta name="description" content="Toko Online Pokoko. Mudah Bayarnya, Aman Belinya dan Terbaik Harganya">
		<meta name="author" content="Fitri Andriyani">
		<link rel='icon' type='../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel='stylesheet' type='text/css' href='../_plugin/_css/landing.css'>
		<script type="text/javascript" src='../_plugin/_js/jquery-1.10.2.min.js'></script>
		<script type="text/javascript">
			function showing_menu(){
				document.getElementById("hideMe").style.display='none';
			}
			function toggle_visibility(id) {
			    var e = document.getElementById(id);
			    if (e.style.display == 'block' || e.style.display=='') e.style.display = 'none';
			    else e.style.display = 'block';
			}
		</script>
		<script>
			<!----- JQUERY FOR SLIDING NAVIGATION --->   
			$(document).ready(function() {
			  $('a[href*=#]').each(function() {
			    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
			    && location.hostname == this.hostname
			    && this.hash.replace(/#/,'') ) {
			      var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) +']');
			      var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
			       if ($target) {
			         var targetOffset = $target.offset().top;

			<!----- JQUERY CLICK FUNCTION REMOVE AND ADD CLASS "ACTIVE" + SCROLL TO THE #DIV--->   
			         $(this).click(function() {
			            $("#nav li a").removeClass("active");
			            $(this).addClass('active');
			           $('html, body').animate({scrollTop: targetOffset}, 1000);
			           return false;
			         });
			      }
			    }
			  });

			});
		</script>
	</head>

	<body onload="showing_menu()">
		<div class='c-main-wrapper' align='center' style='margin-bottom:-20px;'>
			<div class='c-main-wrapper' align='center' id='header'>
			<!-- HEADER START-->
			<div id='h'>
				<div id='h-nav' class='c-f-left'>
					<ul>
						<a href='#slider'>
							<li class='c-b-l-r-light-grey' id='yellow'>
								<img src='../_img/home-icon.png'>
								<p class='c-font-20' id='home'>Beranda</p>
							</li>
						</a>
						<a href='#apa'>
							<li class='' id='dark-blue'>
								<img src='../_img/what-icon.png'>
								<p class='c-font-15 c-m-t-30' id='what'>Apa itu Pokoko?</p>
							</li>
						</a>
					</ul>
				</div>
				<div id='h-logo' class='c-f-left'>
					<a href="pages.php?pages=home"><img src='../_img/logo-pokoko-panjang-2.png'></a>
				</div>
				<div id='h-nav' class='c-f-left'>
					<ul>
						<a href='#mengapa'>
							<li class='c-b-r-light-grey' id='light-blue'>
								<img src='../_img/why-icon.png'>
								<p class='c-font-15 c-m-t-30' id='why'>Mengapa Pokoko?</p>
							</li>
						</a>
						<a href='#bagaimana'>
							<li class='c-b-r-light-grey' id='pink'>
								<img src='../_img/how-icon.png'>
								<p class='c-m-t-20' id='how'>Bagaimana cara kerjanya?</p>
							</li>
						</a>
					</ul>
				</div>
				<div id='nav-small'>
					<img src='../_img/menu-nav.png' class='button' onclick="toggle_visibility('hideMe')">
					<div id='hideMe'>
						<ul class='c-color-light'>
							<a href="#slider"><li class='c-back-yellow'>Beranda</li></a>
							<a href="#apa"><li  class='c-back-dark-blue'>Apa itu Pokoko?</li></a>
							<a href="#mengapa"><li class='c-back-light-blue'>Mengapa Pokoko?</li></a>
							<a href="#bagaimana"><li class='c-back-pink'>Bagaimana cara kerjanya?</li></a>
						</ul>
					</div>
				</div>
			<!-- HEADER END-->
			</div>
		</div>
			<!-- SLIDER START -->
			<div id='slider'>
				<img src="../_img/slider.png">
			</div>
			<!-- SLIDER END -->
			<!-- APA START -->
			<div id='apa' class='c-back-dark-blue'>
				<p class='c-font-ui c-font-50 c-color-light c-f-left'>Apa itu pokoko?</p>
				<p class='c-font-ui c-font-15 c-color-light'>
					Pokoko merupakan sebuah situs online yang memfasilitasi para penjual di berbagai daerah Indonesia untuk terhubung secara maya dengan para pembelinya. Dengan berbagai fitur yang menjanjikan, pokoko dapat menjadi fasilitator dagang nasional di Indonesia. Diharapkan pokoko dapat memberikan kontribusi yang baru dalam perkembangan situs dagang online di Indonesia.
				</p>
			</div>
			<!-- APA END -->
			<!-- MENGAPA START -->
			<div id='mengapa' class='c-back-light-blue'>
				<p class='c-font-50 c-color-light' style='margin-top:20px;'>Mengapa pokoko?</p>
				<ul>
					<li>
						<div id='circle-b' class='c-back-light-blue'>
							<img src="../_img/b-1.png">
							<p class='c-color-light-blue c-font-bell' style='font-size:20pt'>Pembayaran Mudah</p>
						</div>
						<p class='c-color-light-blue c-font-bell' id='me'style='font-size:20pt'>Pembayaran Mudah</p>
						<div id='triangle-1-light-blue'></div>
					</li>
					<li>
						<div id='circle-b' class='c-back-pink'>
							<img src="../_img/b-2.png">
							<p class='c-color-pink c-font-bell' style='font-size:20pt'>Perlindungan Pembeli</p>
						</div>
						<p class='c-color-pink c-font-bell' id='me'style='font-size:20pt'>Perlindungan Pembeli</p>
						<div id='triangle-1-pink'></div>
					</li>
					<li>
						<div id='circle-b' class='c-back-yellow'>
							<img src="../_img/b-3.png">
							<p class='c-color-yellow c-font-bell' style='font-size:20pt'>Memiliki Harga Terbaik</p>
						</div>
						<p class='c-color-yellow c-font-bell' id='me'style='font-size:18pt'>Memiliki Harga Terbaik</p>
						<div id='triangle-1-yellow'></div>
					</li>
				</ul>
			</div>
			<!-- MENGAPA END -->
			<!-- BAGAIMANA START -->
			<div id='bagaimana' class='c-back-pink'>
				<p class='c-font-50 c-color-light' style='margin-top:20px;'>Bagaimana cara kerjanya?</p>
				<div class='c-wrapper-12 c-m-t-20' id='b-1'>
					<ul id='how-list'>
						<li>
							<p id='pertama' class='c-font-25 c-tt-c c-back-light c-color-pink c-text-a-left' style='margin-bottom:10px;font-weight:bold'>Penjual</p>
							<p id='kedua'></p>
							<div class='kolom-1'>
								<table border='0' cellpadding='0' cellspacing='0'>
									<tr>
										<td align='center'><img src="../_img/pasang-iklan.png"></td>
										<td align='center' class='c-color-light c-text-a-justify'>Langkah pertama bagi penjual adalah memasang iklan barang yang akan dijual di situs POKOKO.</td>
										<td align='center'></td>
									</tr>
								</table>
							</div>
							<div class='kolom-1'>
								<table border='0' cellpadding='0' cellspacing='0'>
									<tr>
										<td align='center' class='c-color-light c-text-a-justify'>Setelah itu, jika ada pembeli yang tertarik, penjual dapat berkomunikasi dengan pembeli dan mengesahkan transaksi.</td>
										<td align='center'><img src="../_img/deal.png" style='height:100px;'></td>
										<td align='center'></td>
									</tr>
								</table>
							</div>
							<div class='kolom-1'>
								<table border='0' cellpadding='0' cellspacing='0'>
									<tr>
										<td align='center'></td>
										<td align='center' class='c-color-light c-text-a-justify'>Setelah <i>deal</i>, penjual dapat langsung mengirim barang dagangannya ke alamat pembeli.</td>
										<td align='center'><img src="../_img/kirim-barang.png"></td>
									</tr>
								</table>
							</div>
						</li>
						<li>
							<p id='kedua' class='c-f-left' style='margin-right:0px !important;margin-left:10px !important;'></p>
							<p id='pertama' class='c-font-25 c-tt-c c-text-a-right c-back-light c-color-pink c-f-right' style='margin-bottom:10px;font-weight:bold;padding-left:0px;padding-right:10px;'>Pembeli</p>
							<div class='kolom-1'>
								<table border='0' cellpadding='0' cellspacing='0'>
									<tr>
										<td align='center'></td>
										<td align='center' class='c-color-light c-text-a-justify'>Langkah pertama, pembeli dapat membuka situs POKOKO dan memilih barang yang akan dibelinya.</td>
										<td align='center'><img src="../_img/pilih-barang.png" style='height:100px;'></td>
									</tr>
								</table>
							</div>
							<div class='kolom-1'>
								<table border='0' cellpadding='0' cellspacing='0'>
									<tr>
										<td align='center'></td>
										<td align='center'><img src="../_img/kirim-uang.png" style='height:100px;'></td>
										<td align='center' class='c-color-light c-text-a-justify'>Setelah <i>deal</i> dengan penjual pembeli dapat mengirimkan uang untuk membeli barang.</td>
									</tr>
								</table>
							</div>
							<div class='kolom-1'>
								<table border='0' cellpadding='0' cellspacing='0'>
									<tr>
										<td align='center'><img src="../_img/dapat-barang.png" style='height:100px;'></td>
										<td align='center' class='c-color-light c-text-a-justify'>Langkah terakhir yaitu menunggu barang anda sampai ke alamat rumah anda.</td>
										<td align='center'></td>
									</tr>
								</table>
							</div>
						</li>
					</ul>
				</div>
				<div id='b-2'>
					<ul>
						<li>
							<div id='circle-c'>
								<img src="../_img/pasang-iklan.png">
							</div>
							<div id='circle-c'></div>
							<div id='circle-c'>
								<img src="../_img/deal.png">
							</div>
							<div id='circle-c'></div>
							<div id='circle-c'>
								<img src="../_img/kirim-barang.png">
							</div>

							<p>Penjual pasang iklan</p>
							<p>Pengesahan Transaksi.</p>
							<p>Kirim Barang ke Pembeli.</p>
						</li>
						<li>
							<div id='circle-c'>
								<img src="../_img/pilih-barang.png">
							</div>
							<div id='circle-c'></div>
							<div id='circle-c'>
								<img src="../_img/kirim-uang.png">
							</div>
							<div id='circle-c'></div>
							<div id='circle-c'>
								<img src="../_img/dapat-barang.png">
							</div>

							<p>Pembeli pilih barang.</p>
							<p>Pembeli kirim uang.</p>
							<p>Pembeli dapat barang.</p>
						</li>
					</ul>
				</div>
			</div>
			<!-- BAGAIMANA END -->
			<!-- FOOTER START -->
			<div id='footer' class='c-back-grey'>
				<div id='info'>
					<p class='c-font-ui c-font-15 c-f-left'>Untuk info dan Layanan Hubungi kami di :</p>
					<ul>
						<li><img src="../_img/telp-icon.png" class='c-f-left'><p class='c-text-a-left c-font-15'>022 - 66571001</p></li>
						<li><img src="../_img/mail-icon.png" class='c-f-left'><p class='c-text-a-left c-font-15'>pokoko.support@gmail.com</p></li>
					</ul>
				</div>

				<div id='info-2'>
					<p class='c-font-15'>Untuk info dan Layanan Hubungi kami di :</p>
					<ul>
						<li>
							<img src="../_img/telp-icon.png">
							<p class='c-text-a-left c-font-15'>022 - 66571001</p>
						</li>
						<li>
							<img src="../_img/mail-icon.png">
							<p class='c-text-a-left c-font-15'>pokoko.support@gmail.com</p>
						</li>
					</ul>
				</div>

				<div id='copy'>
					<p>&copy; Pokoko | Mudah Bayarnya Aman Belinya Terbaik Harganya</p>
				</div>
			</div>
			<!-- FOOTER END -->
			<a href="pages.php?pages=home"><div id='skip'>START SHOPPING!</div></a>
		</div>
	</body>
</html>
