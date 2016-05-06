<!DOCTYPE html>
<html>
	<head>
		<title>Barang Diskon!</title>
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
						<p class='c-tt-u c-font-bell c-font-15 c-text-a-left c-color-dark-blue' style='margin-top:-15px;'>Lihat Barang</p>
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
							<input type='radio' name='lih-brg' value='diskon'><p>Barang Terlaris</p>
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
					<div id='title-1' class='c-back-pink'>
						<p class='c-color-light'>Diskon Terbaru</p>
					</div>
					<div id='title-triangle-1-p'></div>
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
							<?php 
								$que_new =  mysql_query("SELECT 
														p.id AS id,
														pd.name AS nama,
														pd.price AS harga,
														pd.description AS desk,
														pd.stock AS stok,
														pi.image AS imgnya,
														pd.rating AS rating, 
														pd.rater AS rater,
														kon.discount AS diskon
													FROM 
														product p,
														product_detail pd,
														product_image PI,
														product_discount kon
													WHERE 
														p.id=pd.id_product 
														AND p.id=pi.id_product 
														AND pi.id_product = p.id
														AND kon.id_product = p.id
														AND kon.discount>0
													ORDER BY kon.discount DESC");
								while ($data_new = mysql_fetch_array($que_new)) {
									$harganya = floatval($data_new['harga']);
									$diskonnya = floatval($data_new['diskon']);
									$harga_disk = $harganya*($diskonnya /100);
									$harga_fix = $harganya - $harga_disk;
									if ($data_new['diskon']=="0") {
										echo "
											<li>
												<a href='pages.php?pages=detail-barang&id-barang=$data_new[id]'>
													<div id='img-news' style='background: #fff url(../_img/_barang/$data_new[imgnya]) top center no-repeat;background-size:cover;'>
													<div class='c-hot-50x50 c-back-light-blue' style='margin-top:-35px;margin-right:10px;'><p>Disc</p></div>
													</div>
													<div id='price-list-1' class='c-back-yellow'><p>Rp. $data_new[harga] ,00</p></div>
													<div id='goods-name-1'><p>$data_new[nama]</p><div class='c-clean'></div></div>
												</a>
												<div id='add-chart-1' class='c-back-yellow'>
													<a href=''>
														<p class='c-hover-back-db'>Tambah ke Troli</p>
														<div class='c-icon-40x40 c-back-dark-blue c-f-right'>
															<img src='../_img/chart-small.png'>
														</div>
													</a>
												</div>
												<div class='c-clean'></div>
											</li>
										";	
									}
									else{
										echo "
											<li>
												<a href='pages.php?pages=detail-barang&id-barang=$data_new[id]'>
													<div id='img-news' style='background: #fff url(../_img/_barang/$data_new[imgnya]) top center no-repeat;background-size:cover;'>
														<div class='c-hot-50x50 c-back-light-blue' style='margin-top:-35px;margin-right:10px;'><p>$data_new[diskon]%</p></div>
													</div>
													<div id='price-list-1' class='c-back-yellow'><p class='c-td-l-t'>Rp. $data_new[harga],00</p></div>
													<div id='goods-name-1'><p>$data_new[nama]</p><div class='c-clean'></div></div>
													<div id='goods-name-1'><span class='c-color-pink c-bold'>Rp. ".$harga_fix."</span><div class='c-clean'></div>
													</div>
												</a>
												<div id='add-chart-1' class='c-back-yellow'>
													<a href=''>
														<p class='c-hover-back-db'>Tambah ke Troli</p>
														<div class='c-icon-40x40 c-back-dark-blue c-f-right'>
															<img src='../_img/chart-small.png'>
														</div>
													</a>
												</div>
												<div class='c-clean'></div>
											</li>
										";	
									}
								}
							?>
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