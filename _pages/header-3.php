<?php
	$jumlah_wish = mysql_query("SELECT COUNT(w.id) as banyak FROM wishlist w,user u WHERE w.id_user=u.id AND u.id='$_COOKIE[uid]'");
	$data = mysql_fetch_array($jumlah_wish);
?>
<div class='c-main-wrapper c-back-light' style='position:fixed;z-index:1000' align='center'>
	<div class='c-wrapper-12' id='header-3' style=''>
		<ul>
			<a href='pages.php?pages=home'><li>Beranda</li></a>
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