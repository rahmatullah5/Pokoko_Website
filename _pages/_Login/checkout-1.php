<!DOCTYPE html>
<html>
	<head>
		<title>Troli</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="e-commerce, pokoko, TokoOnline, ILoveIndonesia, IndonesianProduct">
		<meta name="description" content="Toko Online Pokoko. Mudah Bayarnya, Aman Belinya dan Terbaik Harganya">
		<meta name="author" content="Fitri Andriyani">
		<link rel='icon' type='../../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/style_main.css">
	</head>

	<body style='height:100vh'>
		<div class='c-main-wrapper c-back-light' align='center' style='border-bottom:3px solid #01c3df;'>
			<div class='c-wrapper-10' style='height:75px;'>
				<a href="pages.php?pages=home"><img src="../_img/logo-pokoko-panjang-2.png" class='c-f-left' style='height:60px;margin-top:5px;'></a>
				<div class='c-clean'></div>	
			</div>
			<div class='c-clean'></div>
		</div>
		<div class='c-main-wrapper' align='center'>
			<div class='c-wrapper-10'>
				<p class='c-f-left c-p-all-10 c-b-b-light-grey c-text-a-left' style='width:980px;margin-bottom:10px;'><a href="pages.php?pages=home" class='c-color-light-blue'>< Kembali Belanja</a></p>
				<?php
					$query = mysql_query("SELECT * from cart c, product p, product_detail pd, product_image pi where c.id_product=p.id and pd.id_product=p.id and pi.id_product=p.id and c.id_user='$_COOKIE[uid]' order by c.date desc");
					$cek   = mysql_num_rows($query);
					$qty   = 0;
					while($db=mysql_fetch_array($query)){$qty = $qty + $db['qty'];}
				?>
				<p class='c-f-left c-text-a-left' style='width:980px;'><span class='c-bold'>Troli Belanja Saya </span><span>(<?php echo $qty; ?> Produk)</span></p>
				
				<div class='c-left-side-10 c-m-t-10'>
					<table id='checkout-table' border='0' cellpadding='5'>
						<thead>
							<td width='150px'>Gambar Produk</td>
							<td width='150px'>Detil Produk</td>
							<td width='170px'>Harga Produk</td>
							<td width='100px'>Kuantitas</td>
							<td width='30px'>Batal</td>
						</thead>
						<?php
							$query = mysql_query("SELECT * from cart c, product p, product_detail pd, product_image pi where c.id_product=p.id and pd.id_product=p.id and pi.id_product=p.id and c.id_user='$_COOKIE[uid]' order by c.date desc");
							$cek   = mysql_num_rows($query);
							$qty   = 0;
							$sub   = 0;
							while($db=mysql_fetch_array($query)){ 
								$sub = $sub + $db['price']*$db['qty']; 
								$qty = $qty + $db['qty'];
								$desc = substr($db[description], 0,25);
								$que1 = mysql_query("SELECT * FROM product p, product_detail pd, product_discount pdi WHERE p.id=pd.id_product AND p.id=pdi.id_product AND pdi.discount>0 and p.id='$db[id_product]'");
								$db1 = mysql_fetch_array($que1);
								$tot = $db['price']-($db['price']*$db1['discount'])/100;
								echo"
									<tr class='c-back-light-grey'>
										<td>
											<img src='../_img/_barang/$db[image]'>
										</td>
										<td>
											<p class='c-f-left c-text-a-left'>Ion - Infinix Zero 2 X509 Tempered GLass Screen</p>
											<p class='c-f-left c-text-a-left c-font-10'>Infinix</p>
											<p class='c-f-left c-text-a-left c-font-10 c-color-pink'>Stok Tersedia</p>
											<a href=''>
												<div id='add-wish-2'>
													<span>Pindahkan ke WishList</span>
												</div>
											</a>
										</td>
										";
										if($db1['discount']==0){
											echo"
												<td valign='top'>
													<p class='c-f-left c-bold c-tt-u'>Rp. $db[price],00</p>
												</td>
											";	
										} else{
											echo "
												<td valign='top'>
													<p class='c-f-left c-bold c-tt-u'>Rp. $tot,00</p>
													<p class='c-f-left c-font-10 c-td-l-t'>Rp. $db[price],00</p>
													<p class='c-f-left c-font-10'>$db1[discount]% Off</p>
												</td>
											";
										}

										echo"
										<td valign='middle'>
											<button>-</button>
											<input type='text' name='q-pro-check-1' value='1' style='width:25px;'>	
											<button>+</button>
										</td>
										<td valign='top'>
											<a href='' class='c-f-right c-font-15' style='margin:-10px 5px 0px 0px;'>x</a>
										</td>
									</tr>
								";
							}
						?>
						<div class='c-clean'></div>
					</table>
					<div class='c-clean'></div>		
				</div>
				<div class='c-right-side-10 c-m-t-10'>
					<p class='c-f-left c-text-a-left c-bold' style='padding:0px 0px 10px 0px;border-bottom:1px solid #dedede;width:280px;'>Detil Order</p>
					<p class='c-f-left' style='padding:10px 0px;border-bottom:1px solid #dedede;width:280px;'><span class='c-f-left'>Subtotal : </span><span class='c-f-right'>3.000.000,00</span></p>
					<p class='c-f-left c-font-10' style='padding:10px 0px;width:280px;'><span class='c-f-left'><b>Total </b>(Termasuk PPN) :</span><span class='c-f-right c-font-12'>3.000.000,00</span></p>
					<a href="pages.php?pages=checkout-2" class='' id='button-3'>Lanjutkan pembayaran</a>
					<div class='c-clean'></div>		
				</div>
				<div class='c-clean'></div>	
			</div>
			<div class='c-wrapper-10' style='border-top:1px solid #cecece;margin-top:10px;padding-top:10px'>
				<p>Butuh Bantuan? Hubungi 022-9382172</p>
				<p style='margin-top:10px;'>&copy; All Rights Reserved | Pokoko Co. 2015</p>
			</div>
			<div class='c-clean'></div>
		</div>
	</body>
</html>