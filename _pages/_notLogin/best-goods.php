<!DOCTYPE html>
<html>
	<head>
		<title>Barang Terlaris!</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="e-commerce, pokoko, TokoOnline, ILoveIndonesia, IndonesianProduct">
		<meta name="description" content="Toko Online Pokoko. Mudah Bayarnya, Aman Belinya dan Terbaik Harganya">
		<meta name="author" content="Fitri Andriyani">
		<link rel='icon' type='../../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/style_main.css">
	</head>

	<body>
		<div class='c-main-wrapper' align='center'>
			<?php
				include "header-3.php";
			?>
			<div class='c-wrapper-12'>
				<div id='left-sec-12-25' class='c-fixed' style='padding-left:10px; width:240px;'>
					<form method='post' action=''>
						<p class='c-tt-u c-font-bell c-font-15 c-text-a-left c-color-dark-blue' style='margin-top:-15px;'>LIhat Barang</p>
						<div id='view-brg-nav'>
							<input type='radio' name='lih-brg' value='kategori'><p>Per Kategori</p>	
						</div>
						<div id='view-brg-nav'>
							<input type='radio' name='lih-brg' value='featured'><p>Barang Baru</p>	
						</div>
						<div id='view-brg-nav'>
							<input type='radio' name='lih-brg' value='best'><p>Barang Featured</p>	
						</div>
						<div id='view-brg-nav'>
							<input type='radio' name='lih-brg' value='diskon'><p>Promosi Diskon</p>
						</div>

						<p class='c-tt-u c-font-bell c-font-15 c-text-a-left c-color-dark-blue'>Harga Barang</p>
						<input type='text' name='start-price' placeholder='0' class='price-nav'>
						<p class='c-f-left' style='margin:5px 10px 0px 10px'>Sampai</p>
						<input type='text' name='end-price' placeholder='10000000' class='price-nav'>

						<p class='c-tt-u c-font-bell c-font-15 c-text-a-left c-color-dark-blue'>Berdasarkan Rating</p>
						<div id='view-brg-nav'>
							<input type='radio' name='rating' value='5'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
						</div>
						<div id='view-brg-nav'>
							<input type='radio' name='rating' value='4'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
						</div>
						<div id='view-brg-nav'>
							<input type='radio' name='rating' value='3'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
						</div>
						<div id='view-brg-nav'>
							<input type='radio' name='rating' value='2'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
						</div>
						<div id='view-brg-nav'>
							<input type='radio' name='rating' value='1'>
							<img src="../_img/star3.png" class='c-f-left' style='margin:2px 0px 0px 5px'>
						</div>

						<p class='c-tt-u c-font-bell c-font-15 c-text-a-left c-color-dark-blue' style='margin-top:-5px;'>Cari Merk</p>
						<input type='text' name='start-price' placeholder='Merk Barang' class='price-nav' style='width:210px;background: #fe3153 url(../_img/search.png) right center no-repeat;background-position: 0px 5px 0px 0px;color:#fff'>

						<input type='submit' value='Lihat Barang'>
					</form>
				</div>
				<div id='right-sec-12-93'>
					<div id='title-1' class='c-back-light-blue'>
						<p>Best Sellers</p>
					</div>
					<div id='title-triangle-1-lb'></div>
					<div id='cont-view'>
						<div class='c-b-a-light-grey c-shadow-1'>
							<a href=""><img src="../_img/icon/grid-view.png"></a>
						</div>
						<div>
							<a href=""><img src="../_img/icon/list-view.png"></a>
						</div>
					</div>
					<div id='ads-container-2' style='margin-top:10px;'>
						<ul>
							<li>
								<a href="">
									<div id='img-news' style='background: #fff url(../_img/_barang/3_front.png) center center no-repeat;background-size:cover;'>
										<div class='c-hot-50x50' style='margin-top:-35px;margin-right:10px;'><p>BEST</p></div>
									</div>
									<div id='price-list-1' class='c-back-light-blue'><p>Rp. 50.000</p></div>
									<div id='goods-name-1'><p>Pokoko Iconic hand Bags</p><div class='c-clean'></div></div>
									<div id='for-star-1'>
										<img src="../_img/star3.png">
										<img src="../_img/star3.png">
										<img src="../_img/star3.png">
										<img src="../_img/star2.png">
										<img src="../_img/star.png">
										<p>(12345 review)</p>
									</div>
								</a>
								<div id='add-chart-1' class='c-back-light-blue'>
									<a href="">
										<p class='c-hover-back-p'>Tambah ke Troli</p>
										<div class='c-icon-40x40 c-back-pink c-f-right'>
											<img src="../_img/chart-small.png">
										</div>
									</a>
								</div>
								<div class='c-clean'></div>
							</li>
							<li>
								<a href="">
									<div id='img-news' style='background: #fff url(../_img/_barang/33.jpg) center center no-repeat;background-size:cover;'>
										<div class='c-hot-50x50' style='margin-top:-35px;margin-right:10px;'><p>BEST</p></div>
									</div>
									<div id='price-list-1' class='c-back-light-blue'><p>Rp. 50.000</p></div>
									<div id='goods-name-1'><p>Pokoko Iconic hand Bags</p><div class='c-clean'></div></div>
									<div id='for-star-1'>
										<img src="../_img/star3.png">
										<img src="../_img/star3.png">
										<img src="../_img/star3.png">
										<img src="../_img/star2.png">
										<img src="../_img/star.png">
										<p>(12345 review)</p>
									</div>
								</a>
								<div id='add-chart-1' class='c-back-light-blue'>
									<a href="">
										<p class='c-hover-back-p'>Tambah ke Troli</p>
										<div class='c-icon-40x40 c-back-pink c-f-right'>
											<img src="../_img/chart-small.png">
										</div>
									</a>
								</div>
								<div class='c-clean'></div>
							</li>
							<li>
								<a href="">
									<div id='img-news' style='background: #fff url(../_img/_barang/13.jpg) center center no-repeat;background-size:cover;'>
										<div class='c-hot-50x50' style='margin-top:-35px;margin-right:10px;'><p>BEST</p></div>
									</div>
									<div id='price-list-1' class='c-back-light-blue'><p>Rp. 50.000</p></div>
									<div id='goods-name-1'><p>Pokoko Iconic hand Bags</p><div class='c-clean'></div></div>
									<div id='for-star-1'>
										<img src="../_img/star3.png">
										<img src="../_img/star3.png">
										<img src="../_img/star3.png">
										<img src="../_img/star2.png">
										<img src="../_img/star.png">
										<p>(12345 review)</p>
									</div>
								</a>
								<div id='add-chart-1' class='c-back-light-blue'>
									<a href="">
										<p class='c-hover-back-p'>Tambah ke Troli</p>
										<div class='c-icon-40x40 c-back-pink c-f-right'>
											<img src="../_img/chart-small.png">
										</div>
									</a>
								</div>
								<div class='c-clean'></div>
							</li>
							<li>
								<a href="">
									<div id='img-news' style='background: #fff url(../_img/_barang/3.jpg) center center no-repeat;background-size:cover;'>
										<div class='c-hot-50x50' style='margin-top:-35px;margin-right:10px;'><p>BEST</p></div>
									</div>
									<div id='price-list-1' class='c-back-light-blue'><p>Rp. 50.000</p></div>
									<div id='goods-name-1'><p>Pokoko Iconic hand Bags</p><div class='c-clean'></div></div>
									<div id='for-star-1'>
										<img src="../_img/star3.png">
										<img src="../_img/star3.png">
										<img src="../_img/star3.png">
										<img src="../_img/star2.png">
										<img src="../_img/star.png">
										<p>(12345 review)</p>
									</div>
								</a>
								<div id='add-chart-1' class='c-back-light-blue'>
									<a href="">
										<p class='c-hover-back-p'>Tambah ke Troli</p>
										<div class='c-icon-40x40 c-back-pink c-f-right'>
											<img src="../_img/chart-small.png">
										</div>
									</a>
								</div>
								<div class='c-clean'></div>
							</li>
							<div class='c-clean'></div>
						</ul>
						<div class='c-clean'></div>
					</div>
					<div class='c-clean'></div>		
				</div>
				<div class='c-clean'></div>	
			</div>
			<div class='c-clean'></div>
		</div>

	</body>
</html>