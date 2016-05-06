<!DOCTYPE html>
<html lang='en' class='no-js'>
	<head>
		<title>Selamat Datang di Pokoko!</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="e-commerce, pokoko, TokoOnline, ILoveIndonesia, IndonesianProduct">
		<meta name="description" content="Toko Online Pokoko. Mudah Bayarnya, Aman Belinya dan Terbaik Harganya">
		<meta name="author" content="Fitri Andriyani">
		<link rel='icon' type='../../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/style_main.css">
		<link href="../_plugin/_css/flickerplate.css"  type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../_plugin/_js/jquery.min.js"></script>
		<!--Flickerplate js-->
	    <script src="../_plugin/_js/flickerplate/jquery-v1.10.2.min.js" type="text/javascript"></script>
	    <script src="../_plugin/_js/flickerplate/modernizr-custom-v2.7.1.min.js" type="text/javascript"></script>
	    <script src="../_plugin/_js/flickerplate/hammer-v2.0.3.min.js" type="text/javascript"></script>
	    <script src="../_plugin/_js/flickerplate/flickerplate.min.js" type="text/javascript"></script>
		<script src="../_plugin/_js/modernizr.js" type="text/javascript"></script>
		<script>
			$(function(){
				$('.flicker-example').flickerplate(
				{
		            auto_flick 				: true,
		            auto_flick_delay 		: 8,
		            flick_animation 		: 'transform-slide'
		        });
			});
		</script>
		<!--Flickerplate js-->
		<script type="text/javascript">
		  $(document).ready(function() {
		        //move he last list item before the first item. The purpose of this is if the user clicks to slide left he will be able to see the last item.
		        $('#carousel_ul li:first').before($('#carousel_ul li:last')); 
		        
		        
		        //when user clicks the image for sliding right        
		        $('#right_scroll img').click(function(){
		        
		            //get the width of the items ( i like making the jquery part dynamic, so if you change the width in the css you won't have o change it here too ) '
		            var item_width = $('#carousel_ul li').outerWidth() + 0;
		            
		            //calculae the new left indent of the unordered list
		            var left_indent = parseInt($('#carousel_ul').css('left')) - item_width;
		            
		            //make the sliding effect using jquery's anumate function '
		            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){    
		                
		                //get the first list item and put it after the last list item (that's how the infinite effects is made) '
		                $('#carousel_ul li:last').after($('#carousel_ul li:first')); 
		                
		                //and get the left indent to the default -210px
		                $('#carousel_ul').css({'left' : '0px'});
		            }); 
		        });
		        
		        //when user clicks the image for sliding left
		        $('#left_scroll img').click(function(){
		            
		            var item_width = $('#carousel_ul li').outerWidth() + 0;
		            
		            /* same as for sliding right except that it's current left indent + the item width (for the sliding right it's - item_width) */
		            var left_indent = parseInt($('#carousel_ul').css('left')) + item_width;
		            
		            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){    
		            
		            /* when sliding to left we are moving the last item before the first list item */            
		            $('#carousel_ul li:first').before($('#carousel_ul li:last')); 
		            
		            /* and again, when we make that change we are setting the left indent of our unordered list to the default -210px */
		            $('#carousel_ul').css({'left' : '0px'});
		            });
		            
		            
		        });
		  });
		</script>
		<script type="text/javascript">
			$(window).load(function() {
				// Animate loader off screen
				$(".se-pre-con").fadeOut("slow");;
			});
 		</script>
	</head>
	<body>
		<div class="se-pre-con"></div>
		<div class='c-main-wrapper' align='center'>
			<!--HEADER  START

			HEADER - 1-->
			<div class='c-wrapper-12' id='header-1'>
				<ul class='c-f-left'>
					<?php
						if(empty($_COOKIE['uid'])){
							echo "
							<a href='pages.php?pages=login'><li>Masuk</li></a>
							<a href=''>
								<li id='drop-down-1'>
									<p>Daftar</p>
									<ul>
										<a href='pages.php?pages=daftar-pembeli'><li>Daftar jadi Pembeli</li></a>
										<a href='pages.php?pages=daftar-seller'><li>Daftar jadi Penjual</li></a>
									</ul>
									<div class='c-clean'></div>
								</li>
							</a>
							";
						}
					?>
					<a href='pages.php?pages=barang-baru'><li>Barang Baru</li></a>
					<a href='pages.php?pages=barang-featured'><li>Featured</li></a>
					<a href='pages.php?pages=barang-laris'><li>Best Sellers</li></a>
					<a href='pages.php?pages=barang-diskon'><li>Barang Diskon</li></a>
				</ul>
				<div id='link-admin'>
					<?php
						if(!isset($_COOKIE['uid'])){
							echo "
								<div id='down-app-1'><img src='../_img/get-it-on-google-play-1.png'></div>
							";
						}
						else{
							$que=mysql_query("SELECT * from user where id='$_COOKIE[uid]'");
							$db=mysql_fetch_array($que);
							echo "
								<div style='width:100px;height:200px;float:right;margin:0px 0px 0px 10px;background-color:;position:relative;'>
									<img src='../_img/username-icon.png' class='c-f-right' style='height:30px;margin:5px 0px 0px 10px'>
									<ul id='drop-down-2'>
										";
										if ($db['level']=="user") {
											echo "
												<a href='page-panel.php?page=dashboard-beli'>
													<li>
														<img src='../_img/icon/dashboard-blue.png'>
														<p class='c-f-left c-color-dark-blue'>Beranda Pembeli</p>
													</li>
												</a>
											";
										}
										else if ($db['level']=="supplier") {
											echo "
												<a href='page-panel.php?page=dashboard-supplier'>
													<li>
														<img src='../_img/icon/dashboard-blue.png'>
														<p class='c-f-left c-color-dark-blue'>Beranda Penjual</p>
													</li>
												</a>
											";
										}

										else if ($db['level']=="official-supplier") {
											echo "
												<a href='page-panel.php?page=dashboard-off-supplier'>
													<li>
														<img src='../_img/icon/dashboard-blue.png'>
														<p class='c-f-left c-color-dark-blue'>Beranda Penjual</p>
													</li>
												</a>
											";
										}
										else{
											echo "
												<a href='page-panel.php?page=dashboard-admin'>
													<li>
														<img src='../_img/icon/dashboard-blue.png'>
														<p class='c-f-left c-color-dark-blue'>Beranda Admin</p>
													</li>
												</a>
											";
										}
										echo"
										<a href='../_plugin/_config/proses.php?p=keluar'>
											<li>
												<img src='../_img/icon/unlocked-blue.png'>
												<p class='c-f-left c-color-dark-blue'>Keluar Sistem</p>
											</li>
										</a>
									</ul>
								</div>
							";
							echo "<p class='c-f-right c-color-dark-blue c-m-t-10' style='margin-right:-70px;position:relative;z-index:2'>Hi, ".$db['email']."</p>";
						}
					?>
				</div>
			</div>

			<!--SLIDER-->
			<div id='header-2'>
				<div class="flicker-example">
					<ul>
						<li data-background="../_img/slider.png"></li>
						<li data-background="../_img/slider.png"></li>
						<li data-background="../_img/slider.png"></li>
					</ul>
				</div>
			</div>

			<!--HEADER - 3-->
			<div class='c-wrapper-12' id='header-3'>
				<ul>
					<a href='pages.php?pages=home'><li>Beranda</li></a>
					<?php
						$jumlah_wish = mysql_query("SELECT COUNT(w.id) as banyak FROM wishlist w,user u WHERE w.id_user=u.id AND u.id='$_COOKIE[uid]'");
						$data = mysql_fetch_array($jumlah_wish);
					?>
					<a href='pages.php?pages=wish-list'><li>Wish List Saya <div><?php echo $data['banyak']?></div></li></a>
					<a href='#troli'><li>Troli Belanja</li></a>
					<a href='pages.php?pages=checkout'><li>Checkout!</li></a>
				</ul>
				<div id='search-sec'>
					<form method='post' action='../_plugin/_config/proses.php?p=main-search'>
						<input type='text' name='main-search' placeholder='Cari Barang'>
					</form>
				</div>
				<a href="#x" class='overlay' id='troli'></a>
				<div class='popup'>
					<?php
						$que = mysql_query("SELECT * from cart c, product p, product_detail pd, product_image pi where c.id_product=p.id and pd.id_product=p.id and pi.id_product=p.id and c.id_user='$_COOKIE[uid]'");
						$sub = 0;
						$qty = 0;
						$cek = mysql_num_rows($que);
						while($db=mysql_fetch_array($que)){ $sub = $sub + $db['price']*$db['qty']; $qty = $qty + $db['qty'];}
					?>
					<div class='cont-popup'>
						<div class='half-popup c-b-r-dark-grey'style='margin-left:5px;'>
							<?php
								if($cek==0){
									echo"<p class='c-f-left c-font-15 c-color-pink'>Troli masih kosong !</p>";
								} else{
									echo"<p class='c-f-left c-font-15 c-color-pink'>$qty Barang Telah ditambahkan ke troli !</p>";
								}
								$que = mysql_query("SELECT * from cart c, product p, product_detail pd, product_image pi where c.id_product=p.id and pd.id_product=p.id and pi.id_product=p.id and c.id_user='$_COOKIE[uid]' order by c.date desc limit 0,1");
								while($db=mysql_fetch_array($que)){ $sub = $sub + $db['price']*$db['qty']; $qty = $qty + $db['qty'];
									$desc = substr($db[description], 0,25);
									$que1 = mysql_query("SELECT * FROM product p, product_detail pd, product_discount pdi WHERE p.id=pd.id_product AND p.id=pdi.id_product AND pdi.discount>0 and p.id='$db[id_product]'");
									$db1 = mysql_fetch_array($que1);
									$tot = $db['price']-($db['price']*$db1['discount'])/100;

									echo"
									<div id='img-pop-troli'>
										<img src='../_img/_barang/$db[image]'>
										<div class='c-clean'></div>
									</div>
									<div id='det-pop-troli'>
										<p class='c-f-left c-text-a-left'>$desc...</p>
										";
										if($db1['discount']==0){
											echo "<p class='c-f-left c-bold c-font-15 c-tt-u c-color-dark-blue' style='width:270px;'>Rp. $db[price],00</p>";
										} else{
											echo"
												<p class='c-f-left c-bold c-font-15 c-tt-u c-color-dark-blue' style='width:270px;'>Rp. $tot,00</p>
												<p class='c-f-left c-font-10 c-td-l-t c-tt-u'>Rp. $db[price],00</p>
												<p class='c-f-left c-tt-u c-font-10' style='margin-left:20px'>$db1[discount]% off</p>
											";
										}
										
										echo"
										<div class='c-clean'></div>
									</div>
										";
								}
							?>
							<div class='c-clean'></div>
						</div>
						<div class='half-popup'>
							<?php
								$query = mysql_query("SELECT * from cart c, product p, product_detail pd, product_image pi where c.id_product=p.id and pd.id_product=p.id and pi.id_product=p.id and c.id_user='$_COOKIE[uid]' order by c.date desc");
								$cek   = mysql_num_rows($query);
								$qty   = 0;
								while($db=mysql_fetch_array($query)){$qty = $qty + $db['qty'];}
							?>
							<p class='c-f-left c-bold c-font-15'>Troli Belanja Saya <span class='c-font-12'><?php echo "($qty Produk)"; ?></span></p>
							<ul>
								<?php
									$query = mysql_query("SELECT * from cart c, product p, product_detail pd, product_image pi where c.id_product=p.id and pd.id_product=p.id and pi.id_product=p.id and c.id_user='$_COOKIE[uid]' order by c.date desc limit 0,2");
									$cek   = mysql_num_rows($query);
									$qty   = 0;
									$sub   = 0;
									$disc  = 0;
									while($db=mysql_fetch_array($query)){
									$quer = mysql_query("SELECT * FROM product p, product_detail pd, product_discount pdi WHERE p.id=pd.id_product AND p.id=pdi.id_product AND pdi.discount>0 and p.id='$db[id_product]'");
									$db1 = mysql_fetch_array($quer);
									if($db1['discount']==0){
										$sub = $sub + $db['price']*$db['qty']; $qty = $qty + $db['qty']; $qty2 = $db['price']*$db['qty'];
									} else{
										$disc = $db1['price']-($db1['price']*$db1['discount']/100);
										$sub = $sub + $disc*$db['qty']; $qty = $qty + $db['qty']; $qty2 = $disc*$db['qty'];
									}
									echo"
										<li>
											<p class='c-f-left' style='width:270px;'>$db[name] ($db[qty] pcs)</p>
											<p class='c-f-right'>Rp. $qty2,00</p>
											<div class='c-clean'></div>
										</li>
									";
									}
								?>
								<div class='c-clean'></div>
							</ul>
							<p style='width:410px;padding:10px;' class='c-f-left'><span class='c-bold'>Total </span><span>(Termasuk PPN) :</span><span class='c-f-right'>Rp. <?php echo $sub ?>,00</span></p>
							<p style='width:410px;padding:10px;' class='c-f-left'><a href="#close" class='c-color-dark-blue'>Lanjutkan Berbelanja</a></p>
							<a href="pages.php?pages=checkout" id='button-2' class='c-tt-u c-color-light c-back-light-blue c-f-right' style='margin-top:-40px;'>Konfirmasi pesanan</a>
						</div>
						<div class='c-clean'></div>
					</div>
					<div class='cont-popup-2'>
						<p class='c-f-left c-color-dark-blue c-font-15 c-tt-c'>Penjual Yang Lain</p>
						<ul>
							<?php
								$que = mysql_query("SELECT * from product p, product_image pi, product_detail pd where p.id=pi.id_product and p.id=pd.id_product order by p.tanggal desc limit 0,4");
								while($db=mysql_fetch_array($que)){
									$desc = substr($db['description'], 0,25);
									$quer = mysql_query("SELECT * FROM product p, product_detail pd, product_discount pdi WHERE p.id=pd.id_product AND p.id=pdi.id_product AND pdi.discount>0 and p.id='$db[id_product]'");
									$db1 = mysql_fetch_array($quer);
									echo "
										<li>
											<img src='../_img/_barang/$db[image]'>
											<p class='c-f-left c-bold c-text-a-left'>$desc...</p>";
											
											if($db1['discount']==0){
												echo "<p class='c-f-left c-text-a-left c-bold c-tt-u c-color-pink'>Rp. $db[price],00</p>";	
											} else{
												$disc = $db['price']-($db['price']*$db1['discount']/100);
												echo "
													<p class='c-f-left c-text-a-left c-td-l-t'>Rp. $db[price],00</p>
													<span class='c-f-right c-tt-u' style='margin-top:5px;'>$db1[discount]% Off</span>
													<p class='c-f-left c-text-a-left c-bold c-tt-u c-color-pink'>Rp. $disc,00</p>
												";
											}
											
											echo"
											<div class='c-clean'></div>
										</li>
									";
								}
							?>
							<div class='c-clean'></div>
						</ul>
						<div class='c-clean'></div>
					</div>
					<!--
						Kalau belum belanja apa apa / troli = 0
						<p class='c-f-left'>Troli anda masih Kosong ! <a href="#close" class='c-color-dark-blue'> Lanjut Berbelanja!</a></p>
					-->
					<a class="close" href="#close"></a> 
				</div>

				<!--LIST KATEGORI START-->
				<div id='category-1'>
					<ul>
						<?php
							$que_kategori = mysql_query("SELECT * FROM category");
							while ($data_kat = mysql_fetch_array($que_kategori)) {
								echo "
									<a href='pages.php?pages=kategori&id-kategorinya=$data_kat[id]'>
										<li>
											<img src='../_img/icon/category/$data_kat[image]'>
											<p>$data_kat[category]</p>
											<div class='c-clean'></div>
										</li>
										<div class='c-clean'></div>
									</a>
								";
							}
						?>
						<div class='c-clean'></div>
					</ul>
					<div class='c-clean'></div>
				</div>
				<!--LIST KATEGORI END-->
			</div>
			<!--HEADER  END-->

			<!--NEW GOODS START-->
			<div id='ads-goods-1' class='c-b-t-5-yellow'>
				<div class='c-wrapper-12'>
					<div id='title-1' class='c-back-yellow'>
						<p>Barang Baru</p>
					</div>
					<div id='title-triangle-1-y'></div>
				</div>
				<div class='c-wrapper-12' id='ads-container'>
					<ul>
						<?php
							$brg_baru =  mysql_query("SELECT p.id as id,pd.name as name,pd.price as price,pd.description as desk,pd.stock as stok,pi.image as imgnya,pd.rating as rating, pd.rater as rater FROM product p,product_detail pd,product_image pi where p.id=pd.id_product AND p.id=pi.id_product order by p.tanggal desc limit 0,5");
							while ($data_baru = mysql_fetch_array($brg_baru)) {
								$que = mysql_query("SELECT * FROM product p, product_detail pd, product_discount pdi WHERE p.id=pd.id_product AND p.id=pdi.id_product AND pdi.discount>0 and p.id='$data_baru[id]'");
								$db = mysql_fetch_array($que);
								$desc = substr($data_baru['name'], 0,25);
								echo"
									<li>
										<a href='pages.php?pages=detail-barang&id-barang=$data_baru[id]'>
											<div id='img-news' style='background: #fff url(../_img/_barang/$data_baru[imgnya]) center center no-repeat;background-size:cover;'></div>
											";
											
											if($db['discount']==0){echo "<div id='price-list-1' class='c-back-yellow'><p>Rp. $data_baru[price]</p></div>";}
											else if($db['discount']>0){
												$tot = $data_baru['price']-($data_baru['price']*$db['discount'])/100;
												echo "<div id='price-list-1' class='c-back-yellow'><p><strike style='color:red; font-size:10pt;'>Rp. $data_baru[price]</strike> Rp. $tot</p></div>";
											}
											
											echo"
											<div id='goods-name-1'><p>$desc...</p><div class='c-clean'></div></div>
											<div id='for-star-1'>";
												$rate = $data_baru['rating']/$data_baru['rater'];
												if($rate==5){
													for($i=0;$i<5;$i++){echo "<img src='../_img/star3.png'>";}
												} else if($rate==4){
													for($i=0;$i<4;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
												} else if($rate==3){
													for($i=0;$i<3;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate==2){
													for($i=0;$i<2;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate==1){
													for($i=0;$i<1;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate==0){
													for($i=0;$i<5;$i++){echo "<img src='../_img/star.png'>";}
												} else if($rate > 4 && $rate<5){
													for($i=0;$i<4;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
												} else if($rate > 3 && $rate<4){
													for($i=0;$i<3;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate > 2 && $rate<3){
													for($i=0;$i<2;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate > 1 && $rate<2){
													for($i=0;$i<1;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate > 0 && $rate<1){
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												}
												echo"
											</div>
										</a>
										<div id='add-chart-1' class='c-back-yellow'>
											<a href='../_plugin/_config/proses.php?p=add-cart&id=$data_baru[id]'>
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
						?>
						
						<div class='c-clean'></div>
					</ul>
					<div id='title-triangle-2-y'></div>
					<a href="pages.php?pages=barang-baru" id='load-more-ads-1' class='c-back-yellow'>
						Lihat lebih banyak Barang
					</a>
					<div class='c-clean'></div>
				</div>
				<div class='c-clean'></div>
			</div>
			<!--NEW GOODS END-->

			<!--FEATURED GOODS START-->
			<div id='ads-goods-1' class='c-b-t-5-dark-blue'>
				<div class='c-wrapper-12'>
					<div id='title-1' class='c-back-dark-blue'>
						<p class='c-color-light'>Featured</p>
					</div>
					<div id='title-triangle-1-db'></div>
				</div>

				<div class='c-wrapper-12' id='ads-container'>
					<ul>
						<?php
							$brg_baru =  mysql_query("SELECT * FROM product p, product_detail pd, product_featured pf, product_image pi WHERE p.id=pd.id_product AND p.id=pf.id_product AND p.id=pi.id_product and pf.status='ya' order by p.tanggal desc limit 0,5");
							while ($data_baru = mysql_fetch_array($brg_baru)) {
								$que = mysql_query("SELECT * FROM product p, product_detail pd, product_discount pdi WHERE p.id=pd.id_product AND p.id=pdi.id_product AND pdi.discount>0 and p.id='$data_baru[id_product]'");
								$db = mysql_fetch_array($que);
								$desc = substr($data_baru['name'], 0,25);
								echo"
									<li>
										<a href='pages.php?pages=detail-barang&id-barang=$data_baru[id_product]'>
											<div id='img-news' style='background: #fff url(../_img/_barang/$data_baru[image]) center center no-repeat;background-size:cover;'></div>
											";
											
											if($db['discount']==0){echo "<div id='price-list-1' class='c-back-dark-blue'><p>Rp. $data_baru[price]</p></div>";}
											else if($db['discount']>0){
												$tot = $data_baru['price']-($data_baru['price']*$db['discount'])/100;
												echo "<div id='price-list-1' class='c-back-dark-blue'><p><strike style='color:red; font-size:10pt;'>Rp. $data_baru[price]</strike> Rp. $tot</p></div>";
											}
											
											echo"
											<div id='goods-name-1'><p>$desc...</p><div class='c-clean'></div></div>
											<div id='for-star-1'>";
												$rate = $data_baru['rating']/$data_baru['rater'];
												if($rate==5){
													for($i=0;$i<5;$i++){echo "<img src='../_img/star3.png'>";}
												} else if($rate==4){
													for($i=0;$i<4;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
												} else if($rate==3){
													for($i=0;$i<3;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate==2){
													for($i=0;$i<2;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate==1){
													for($i=0;$i<1;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate==0){
													for($i=0;$i<5;$i++){echo "<img src='../_img/star.png'>";}
												} else if($rate > 4 && $rate<5){
													for($i=0;$i<4;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
												} else if($rate > 3 && $rate<4){
													for($i=0;$i<3;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate > 2 && $rate<3){
													for($i=0;$i<2;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate > 1 && $rate<2){
													for($i=0;$i<1;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate > 0 && $rate<1){
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												}
												echo"
											</div>
										</a>
										<div id='add-chart-1' class='c-back-dark-blue'>
											<a href='../_plugin/_config/proses.php?p=add-cart&id=$data_baru[id_product]'>
												<p class='c-hover-back-lb'>Tambah ke Troli</p>
												<div class='c-icon-40x40 c-back-light-blue c-f-right'>
													<img src='../_img/chart-small.png'>
												</div>
											</a>
										</div>
										<div class='c-clean'></div>
									</li>
								";
							}
						?>
						<div class='c-clean'></div>
					</ul>
					<div id='title-triangle-2-db'></div>
					<a href="pages.php?pages=barang-featured" id='load-more-ads-1' class='c-back-dark-blue c-color-light'>
						Lihat lebih banyak Barang
					</a>
					<div class='c-clean'></div>
				</div>
				<div class='c-clean'></div>
			</div>
			<!--FEATURED GOODS START-->

			<!--BEST SELLERS GOODS START-->
			<div id='ads-goods-1' class='c-b-t-5-light-blue'>
				<div class='c-wrapper-12'>
					<div id='title-1' class='c-back-light-blue'>
						<p>Best Sellers</p>
					</div>
					<div id='title-triangle-1-lb'></div>
				</div>

				<div class='c-wrapper-12' id='ads-container'>
					<ul>
						<?php
							$brg_baru =  mysql_query("SELECT p.id AS id_product, pim.image AS image, pd.name AS name, pd.price AS price, pd.rating AS rating, pd.rater AS rater, SUM(op.qty) AS qty1 FROM order_product op, product p, product_detail pd, product_image pim WHERE p.id=op.id_product AND p.id=pd.id_product AND p.id=pim.id_product GROUP BY op.id_product ORDER BY qty1 DESC limit 0,5");
							while ($data_baru = mysql_fetch_array($brg_baru)) {
								$que = mysql_query("SELECT * FROM product p, product_detail pd, product_discount pdi WHERE p.id=pd.id_product AND p.id=pdi.id_product AND pdi.discount>0 and p.id='$data_baru[id_product]'");
								$db = mysql_fetch_array($que);
								$desc = substr($data_baru['name'], 0,25);
								echo"
									<li>
										<a href='pages.php?pages=detail-barang&id-barang=$data_baru[id_product]'>
											<div id='img-news' style='background: #fff url(../_img/_barang/$data_baru[image]) center center no-repeat;background-size:cover;'>
												<div class='c-hot-50x50' style='margin-top:-30px;'><p>BEST</p></div>
											</div>
											";
											
											if($db['discount']==0){echo "<div id='price-list-1' class='c-back-dark-blue'><p>Rp. $data_baru[price]</p></div>";}
											else if($db['discount']>0){
												$tot = $data_baru['price']-($data_baru['price']*$db['discount'])/100;
												echo "<div id='price-list-1' class='c-back-dark-blue'><p><strike style='color:red; font-size:10pt;'>Rp. $data_baru[price]</strike> Rp. $tot</p></div>";
											}
											
											echo"
											<div id='goods-name-1'><p>$desc...</p><div class='c-clean'></div></div>
											<div id='for-star-1'>";
												$rate = $data_baru['rating']/$data_baru['rater'];
												if($rate==5){
													for($i=0;$i<5;$i++){echo "<img src='../_img/star3.png'>";}
												} else if($rate==4){
													for($i=0;$i<4;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
												} else if($rate==3){
													for($i=0;$i<3;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate==2){
													for($i=0;$i<2;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate==1){
													for($i=0;$i<1;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate==0){
													for($i=0;$i<5;$i++){echo "<img src='../_img/star.png'>";}
												} else if($rate > 4 && $rate<5){
													for($i=0;$i<4;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
												} else if($rate > 3 && $rate<4){
													for($i=0;$i<3;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate > 2 && $rate<3){
													for($i=0;$i<2;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate > 1 && $rate<2){
													for($i=0;$i<1;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate > 0 && $rate<1){
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												}
												echo"
											</div>
										</a>
										<div id='add-chart-1' class='c-back-light-blue'>
											<a href='../_plugin/_config/proses.php?p=add-cart&id=$data_baru[id_product]'>
												<p class='c-hover-back-p'>Tambah ke Troli</p>
												<div class='c-icon-40x40 c-back-light-blue c-f-right'>
													<img src='../_img/chart-small.png'>
												</div>
											</a>
										</div>
										<div class='c-clean'></div>
									</li>
								";
							}
						?>
						<div class='c-clean'></div>
					</ul>
					<div id='title-triangle-2-lb'></div>
					<a href="pages.php?pages=barang-laris" id='load-more-ads-1' class='c-back-light-blue c-color-light'>
						Lihat lebih banyak Barang
					</a>
					<div class='c-clean'></div>
				</div>
				<div class='c-clean'></div>
			</div>
			<!--BEST SELLERS GOODS END-->

			<!--DISCOUNT GOODS START-->
			<div id='ads-goods-1' class='c-b-t-5-pink' style='margin-bottom:20px;'>
				<div class='c-wrapper-12'>
					<div id='title-1' class='c-back-pink'>
						<p class='c-color-light'>Diskon Terbaru</p>
					</div>
					<div id='title-triangle-1-p'></div>
				</div>
				<div class='c-wrapper-12' id='ads-container'>
					<ul style='margin-top:20px;'>
						<?php
							$brg_baru =  mysql_query("SELECT * FROM product p, product_detail pd, product_discount pdi, product_image pim WHERE p.id=pd.id_product AND p.id=pim.id_product AND p.id=pdi.id_product AND pdi.discount>0 order by pdi.discount desc limit 0,5");
							while ($data_baru = mysql_fetch_array($brg_baru)) {
								$que = mysql_query("SELECT * FROM product p, product_detail pd, product_discount pdi WHERE p.id=pd.id_product AND p.id=pdi.id_product AND pdi.discount>0 and p.id='$data_baru[id_product]'");
								$db = mysql_fetch_array($que);
								$desc = substr($data_baru['name'], 0,25);
								echo"
									<li>
										<a href='pages.php?pages=detail-barang&id-barang=$data_baru[id_product]'>
											<div id='img-news' style='background: #fff url(../_img/_barang/$data_baru[image]) center center no-repeat;background-size:cover;'>
												<div class='c-hot-50x50 c-back-light-blue' style='margin-top:-30px;'><p>Disc</p></div>
											</div>
											";
											
											if($db['discount']==0){echo "<div id='price-list-1' class='c-back-pink'><p class='c-color-light'>Rp. $data_baru[price]</p></div>";}
											else if($db['discount']>0){
												$tot = $data_baru['price']-($data_baru['price']*$db['discount'])/100;
												echo "<div id='price-list-1' class='c-back-pink'><p class='c-color-light'><strike style='color:yellow; font-size:10pt;'>Rp. $data_baru[price]</strike> Rp. $tot</p></div>";
											}
											
											echo"
											<div id='goods-name-1'><p>$desc...</p><div class='c-clean'></div></div>
											<div id='for-star-1'>";
												$rate = $data_baru['rating']/$data_baru['rater'];
												if($rate==5){
													for($i=0;$i<5;$i++){echo "<img src='../_img/star3.png'>";}
												} else if($rate==4){
													for($i=0;$i<4;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
												} else if($rate==3){
													for($i=0;$i<3;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate==2){
													for($i=0;$i<2;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate==1){
													for($i=0;$i<1;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate==0){
													for($i=0;$i<5;$i++){echo "<img src='../_img/star.png'>";}
												} else if($rate > 4 && $rate<5){
													for($i=0;$i<4;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
												} else if($rate > 3 && $rate<4){
													for($i=0;$i<3;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate > 2 && $rate<3){
													for($i=0;$i<2;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate > 1 && $rate<2){
													for($i=0;$i<1;$i++){echo "<img src='../_img/star3.png'>";}
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												} else if($rate > 0 && $rate<1){
													echo "<img src='../_img/star2.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
													echo "<img src='../_img/star.png'>";
												}
												echo"
											</div>
										</a>
										<div id='add-chart-1' class='c-back-pink'>
											<a href='../_plugin/_config/proses.php?p=add-cart&id=$data_baru[id_product]'>
												<p class='c-hover-back-y c-color-light'>Tambah ke Troli</p>
												<div class='c-icon-40x40 c-back-yellow c-f-right'>
													<img src='../_img/chart-small.png'>
												</div>
											</a>
										</div>
										<div class='c-clean'></div>
									</li>
								";
							}
						?>
						<div class='c-clean'></div>
					</ul>
					<div id='title-triangle-2-p'></div>
					<a href="pages.php?pages=barang-diskon" id='load-more-ads-1' class='c-back-pink c-color-light'>
						Lihat lebih banyak Barang
					</a>
					<div class='c-clean'></div>
				</div>
				<div class='c-clean'></div>
			</div>
			<!--DISCOUNT GOODS END-->

			<!--SEARCH HISTORY START-->
			<div class='c-wrapper-12' id='search-history-1'>
				<p>Pelanggan dengan minat yang sama juga melihat</p>
			    <div id='carousel-container'>
			      <div id='left_scroll'><img src='../_img/carousel/left.png' style='height:40px' /></div>  
			      <div id='carousel_inner'>  
			            <ul id='carousel_ul'>
			            	<?php
			            		$que = mysql_query("SELECT * from product p, product_detail pd, product_image pim where p.id=pd.id_product and p.id=pim.id_product order by p.tanggal desc limit 0,10");
			            		while ($db=mysql_fetch_array($que)) {
			            			$desc = substr($db['description'], 0, 25);
			            			$rate = $db['rating']/$db['rater'];
			            			echo"
			            			<li>
					                	<a href='pages.php?pages=detail-barang&id-barang=$db[id_product]'>
					                		<div id='img-history'>
					                			<img src='../_img/_barang/$db[image]'>
					                		</div>
					                		<p class='c-text-a-left c-tt-c c-bold'>$desc...</p>
					                		<p class='c-text-a-left c-color-dark-blue c-bold'>Rp. $db[price],00</p>
					                		<p class='c-text-a-left' style='font-size:10pt'>Rating : $rate</p>
					                		<p class='c-p-all-5 c-back-yellow' id='add-chart-2'>BELI SEKARANG</p>
					                	</a>
					                </li>
					                ";
			            		}
			            	?>
			            </ul>  
			      </div>  
			      <div id='right_scroll'><img src='../_img/carousel/right.png' style='height:40px'/></div>
			    </div>
			    <div class='c-clean'></div>
			</div>
			<!--SEARCH HISTORY END-->

			<!--FOOTER START-->
			<div class='c-main-wrapper c-b-t-5-yellow' style='margin-top:80px;'>
				<div class='c-wrapper-12' id='footer-container'>
					<div id='footer-1'>
						<ul>
							<li>
								<p class='c-text-a-left c-font-15 c-m-b-10'>Informasi</p>
								<a href="pages.php?pages=tentang"><p class='c-text-a-left c-m-b-10'>Tentang Kami</p></a>
								<a href="pages.php?pages=tentang"><p class='c-text-a-left c-m-b-10'>Informasi Pengiriman</p></a>
								<a href="pages.php?pages=tentang"><p class='c-text-a-left c-m-b-10'>Kebijakan Privasi</p></a>
								<a href="pages.php?pages=tentang"><p class='c-text-a-left c-m-b-10'>Syarat & Ketentuan</p></a>
							</li>
							<li>
								<p class=' c-tt-u c-font-15 c-bold'>Jadilah merchant kami</p>
								<a href="pages.php?pages=daftar-seller"><img src="../_img/promo-merchant-1.png" class='c-m-t-10 ' style='height:90px;width:300px;margin-left:-5px;'></a>
								<p class='c-text-a-left c-m-t-10'>Miliki Toko Online-mu di Pokoko.co.id <a href="pages.php?pages=daftar-seller" class='c-color-light-blue'>Selengkapnya</a></p>
							</li>
							<li>
								<p class='c-tt-u c-text-a-left'>Download aplikasi mobile pokoko</p>
								<img src="../_img/promo-app-1.png" class='c-m-t-10 c-f-left' style='height:150px;width:280px;'>
							</li>
							<li>
								<p class='c-text-a-left'>Untuk info & layanan hubungi kami di :</p>
								<img src="../_img/telp-icon.png" class='c-m-t-10 c-f-left' style='height: 40px;'><span class='c-f-left c-m-t-10 c-font-15' style='margin-left:20px;'>022 - 66571001</span><br><br><br>
								<img src="../_img/mail-icon.png" class='c-f-left' style='height: 40px;margin-left:5px;'><span class='c-f-left' style='margin-top:-40px;margin-left:60px;'>pokoko.support@gmail.com</span>
							</li>
						</ul>
					</div>
					<div class='c-clean'></div>
				</div>
				<p class='c-p-all-10 c-back-dark-blue c-color-light'>&copy; Pokoko Co. | 2015</p>
				<div class='c-clean'></div>
			</div>
			<!--FOOTER END-->
			<div class='c-clean'></div>
		</div>
	</body>
</html>