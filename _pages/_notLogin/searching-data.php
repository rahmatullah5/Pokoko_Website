<?php
	include "../../_plugin/_config/koneksi.php";
	$cari_data = mysql_query("SELECT p.id as id,pd.name as name,pd.price as price,pd.description as desk,pd.stock as stok,pi.image as imgnya  FROM product p,product_detail pd,product_image pi where p.id=pd.id_product AND p.id=pi.id_product AND name like'%$_SESSION[cari]%' order by p.tanggal desc");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Hasil Pencarian <?php echo $_SESSION['cari']?></title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="e-commerce, pokoko, TokoOnline, ILoveIndonesia, IndonesianProduct">
		<meta name="description" content="Toko Online Pokoko. Mudah Bayarnya, Aman Belinya dan Terbaik Harganya">
		<meta name="author" content="Fitri Andriyani">
		<link rel='icon' type='../../_img/pokoko_icon.png' href='../../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../../_plugin/_css/style_main.css">
	</head>

	<body>
		<div class='c-main-wrapper' align='center'>
			<div class='c-main-wrapper c-back-light' style='position:fixed;z-index:1000' align='center'>
				<div class='c-wrapper-12' id='header-3' style=''>
					<ul>
						<a href='../pages.php?pages=home'><li>Beranda</li></a>
						<a href='../pages.php?pages=wish-list'><li>Wish List Saya <div>0</div></li></a>
						<a href='#troli'><li>Troli Belanja</li></a>
						<a href='../pages.php?pages=checkout'><li>Checkout!</li></a>
					</ul>
					<div id='search-sec'>
						<form method='post' action='../../_plugin/_config/proses.php?p=main-search'>
							<input type='text' name='main-search' placeholder='Cari Barang'>
						</form>
					</div>
					<a href="#x" class='overlay' id='troli'></a>
					<div class='popup'>
						<div class='cont-popup'>
							<div class='half-popup c-b-r-dark-grey'style='margin-left:5px;'>
								<p class='c-f-left c-font-15 c-color-pink'>1 Barang Telah ditambahkan ke troli !</p>
								<div id='img-pop-troli'>
									<img src="../_img/_barang/3_front.png">
									<div class='c-clean'></div>
								</div>
								<div id='det-pop-troli'>
									<p class='c-f-left c-text-a-left'>Nama Barangnya ya okay okay kalo panjang gimana?</p>
									<p class='c-f-left c-bold c-font-15 c-tt-u c-color-dark-blue' style='width:270px;'>Rp. 1.500.000,00</p>
									<p class='c-f-left c-font-10 c-td-l-t c-tt-u'>Rp.2.000.000,00</p>
									<p class='c-f-left c-tt-u c-font-10' style='margin-left:20px'>10% off</p>
									<div class='c-clean'></div>
								</div>
								<div class='c-clean'></div>
							</div>
							<div class='half-popup'>
								<p class='c-f-left c-bold c-font-15'>Troli Belanja Saya <span class='c-font-12'>(2 Produk)</span></p>
								<ul>
									<li>
										<p class='c-f-left' style='width:270px;'>Produk 1 Namanya pendek</p>
										<p class='c-f-right'>Rp. 2.500.000,00</p>
										<div class='c-clean'></div>
									</li>
									<div class='c-clean'></div>
								</ul>
								<p style='width:410px;padding:10px;' class='c-f-left'><span class='c-bold'>Total </span><span>(Termasuk PPN) :</span><span class='c-f-right'>Rp. 5.000.000,00</span></p>
								<p style='width:410px;padding:10px;' class='c-f-left'><a href="#close" class='c-color-dark-blue'>Lanjutkan Berbelanja</a></p>
								<a href="pages.php?pages=checkout" id='button-2' class='c-tt-u c-color-light c-back-light-blue c-f-right' style='margin-top:-40px;'>Konfirmasi pesanan</a>
							</div>
							<div class='c-clean'></div>
						</div>
						<div class='cont-popup-2'>
							<p class='c-f-left c-color-dark-blue c-font-15 c-tt-c'>Penjual Terlaris di kategori pakaian</p>
							<ul>
								<li>
									<img src="../_img/_barang/3_front.png">
									<p class='c-f-left c-bold c-text-a-left'>Ion - Infinix Zero 2 X509 Tempered GLass Screen 
									ya</p>
									<p class='c-f-left c-text-a-left c-td-l-t'>Rp. 150.000,00</p>
									<span class='c-f-right c-tt-u' style='margin-top:5px;'>10% Off</span>
									<p class='c-f-left c-text-a-left c-bold c-tt-u c-color-pink'>Rp. 130.000,00</p>
									<div class='c-clean'></div>
								</li>
								<li>
									<img src="../_img/_barang/3_front.png">
									<p class='c-f-left c-bold c-text-a-left'>Ion - Infinix Zero 2 X509 Tempered GLass Screen 
									ya</p>
									<p class='c-f-left c-text-a-left c-td-l-t'>Rp. 150.000,00</p>
									<span class='c-f-right c-tt-u' style='margin-top:5px;'>10% Off</span>
									<p class='c-f-left c-text-a-left c-bold c-tt-u c-color-pink'>Rp. 130.000,00</p>
									<div class='c-clean'></div>
								</li>
								<li>
									<img src="../_img/_barang/3_front.png">
									<p class='c-f-left c-bold c-text-a-left'>Ion - Infinix Zero 2 X509 Tempered GLass Screen 
									ya</p>
									<p class='c-f-left c-text-a-left c-td-l-t'>Rp. 150.000,00</p>
									<span class='c-f-right c-tt-u' style='margin-top:5px;'>10% Off</span>
									<p class='c-f-left c-text-a-left c-bold c-tt-u c-color-pink'>Rp. 130.000,00</p>
									<div class='c-clean'></div>
								</li>
								<li>
									<img src="../_img/_barang/3_front.png">
									<p class='c-f-left c-bold c-text-a-left'>Ion - Infinix Zero 2 X509 Tempered GLass Screen 
									ya</p>
									<p class='c-f-left c-text-a-left c-td-l-t'>Rp. 150.000,00</p>
									<span class='c-f-right c-tt-u' style='margin-top:5px;'>10% Off</span>
									<p class='c-f-left c-text-a-left c-bold c-tt-u c-color-pink'>Rp. 130.000,00</p>
									<div class='c-clean'></div>
								</li>
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
				</div>
				<div class='c-clean'></div>
			</div>
			<div id='header-4' class='c-main-wrapper c-b-b-light-grey' style='padding-top:65px;' align='center'>
				<div class='c-wrapper-12' style='height:30px;'>
					<p class='c-f-left c-color-pink c-font-bell c-font-25' style='line-height:40px;'>Hasil Pencarian kata '<?php echo $_SESSION['cari']?>'</p>
					<div class='c-clean'></div>
				</div>
				<div class='c-clean'></div>
			</div>
			<div class='c-wrapper-12' style='margin-top:10px;'>
				<ul id='wish-list-brg'>
					<?php
					if (mysql_num_rows($cari_data)==0) {
						echo "
						<div class='c-wrapper-12' style='height:175px;margin:1px 0px 0px -20px;position:relative'>
							<p class='c-font-bell' style='font-size:40pt;line-height:200px;'>TIDAK ADA DATA YANG DITEMUKAN</p>
						</div>
						";
					}
					else{
						while ($data = mysql_fetch_array($cari_data)) {
							
							echo "
								<li>
									<div id='img-wish-list' style='background: #fff url(../../_img/_barang/$data[imgnya]) top center no-repeat;background-size:cover;height:400px;'>
									</div>
									<div id='ket-wish' class='c-back-grey'>
										<p class='c-f-left c-text-a-left c-bold'>$data[name]</p>
										<p class='c-f-left c-text-a-left c-color-pink c-bold' style='width:280px;margin-bottom:10px;'>Rp. $data[price],00</p>
										<div id='for-star-1' style='margin:5px 0px 10px -65px;'>
											<img src='../../_img/star3.png'>
											<img src='../../_img/star3.png'>
											<img src='../../_img/star3.png'>
											<img src='../../_img/star2.png'>
											<img src='../../_img/star.png'>
											<p class='c-font-12 c-color-dark' style='margin-top:-3px'> Rating : 3.5</p>
										</div>
										<p class='c-f-left c-text-a-left c-color-dark-blue c-bold' style='margin-top:10px;width:280px'>$data[stok]</p>
										<div class='c-clean'></div>
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
			<div class='c-main-wrapper c-b-t-5-yellow' style='margin-top:80px;'>
			<div class='c-wrapper-12' id='footer-container'>
				<div id='footer-1'>
					<ul>
						<li>
							<p class='c-text-a-left c-font-15 c-m-b-10'>Informasi</p>
							<a href=""><p class='c-text-a-left c-m-b-10'>Tentang Kami</p></a>
							<a href=""><p class='c-text-a-left c-m-b-10'>Informasi Pengiriman</p></a>
							<a href=""><p class='c-text-a-left c-m-b-10'>Kebijakan Privasi</p></a>
							<a href=""><p class='c-text-a-left c-m-b-10'>Syarat & Ketentuan</p></a>
						</li>
						<li>
							<p class=' c-tt-u c-font-15 c-bold'>Jadilah merchant kami</p>
							<a href=""><img src="../../_img/promo-merchant-1.png" class='c-m-t-10 ' style='height:90px;width:300px;margin-left:-5px;'></a>
							<p class='c-text-a-left c-m-t-10'>Miliki Toko Online-mu di Pokoko.co.id <a href="" class='c-color-light-blue'>Selengkapnya</a></p>
						</li>
						<li>
							<p class='c-tt-u c-text-a-left'>Download aplikasi mobile pokoko</p>
							<img src="../../_img/promo-app-1.png" class='c-m-t-10 c-f-left' style='height:150px;width:280px;'>
						</li>
						<li>
							<p class='c-text-a-left'>Untuk info & layanan hubungi kami di :</p>
							<img src="../../_img/telp-icon.png" class='c-m-t-10 c-f-left' style='height: 40px;'><span class='c-f-left c-m-t-10 c-font-15' style='margin-left:20px;'>022 - 66571001</span><br><br><br>
							<img src="../../_img/mail-icon.png" class='c-f-left' style='height: 40px;margin-left:5px;'><span class='c-f-left' style='margin-top:-40px;margin-left:60px;'>pokoko.support@gmail.com</span>
						</li>
					</ul>
				</div>
				<div class='c-clean'></div>
			</div>
			<p class='c-p-all-10 c-back-dark-blue c-color-light'>&copy; Pokoko Co. | 2015</p>
			<div class='c-clean'></div>
		</div>
			<div class='c-clean'></div>
		</div>
	</body>
</html>