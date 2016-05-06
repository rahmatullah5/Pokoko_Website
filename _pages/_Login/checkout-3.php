<!DOCTYPE html>
<html>
	<head>
		<title>Pilih Alamat Pengiriman</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="e-commerce, pokoko, TokoOnline, ILoveIndonesia, IndonesianProduct">
		<meta name="description" content="Toko Online Pokoko. Mudah Bayarnya, Aman Belinya dan Terbaik Harganya">
		<meta name="author" content="Fitri Andriyani">
		<link rel='icon' type='../../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/style_main.css">
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/animate.min.css">
	</head>

	<body style='height:100vh'>
		<div class='c-main-wrapper c-back-light' align='center' style='border-bottom:3px solid #01c3df;'>
			<div class='c-wrapper-10' style='height:75px;'>
				<a href="pages.php?pages=home"><img src="../_img/logo-pokoko-panjang-2.png" class='c-f-left' style='height:60px;margin-top:5px;'></a>
				<div id='head-pagination-checkout'>
					<ul>
						<a href="pages.php?pages=checkout-2">
							<li class='c-b-r-dark-grey'><p>1. Login</p></li>
						</a>
						<a href="pages.php?pages=checkout-3">
							<li class='c-b-r-dark-grey c-back-light-blue'><p class='c-color-light'>2. Pengiriman</p></li>
						</a>
						<a href="">
							<li class='c-b-r-dark-grey'><p>3. Selamat!</p></li>
						</a>
					</ul>
				</div>
				<div class='c-clean'></div>	
			</div>
			<div class='c-clean'></div>
		</div>
		<div class='c-main-wrapper' align='center'>
			<div class='c-wrapper-10'>
				<div class='c-left-side-10 c-m-t-10 c-b-a-light-grey' style='height:400px;'>
					<p class='c-f-left c-b-b-light-grey c-text-a-left c-tt-c' style='width:690px;padding:5px;'>Alamat Pengiriman Anda</p>
					<table id='kirim-check-3' cellpadding='5'>
						<form method='post' action=''>
							<tr>
								<td>Nama</td>
								<td><input type='text' name='kirim-name'></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><textarea name='kirim-alamat' style='resize:none'></textarea></td>
							</tr>
							<tr>
								<td>Provinsi</td>
								<td>
									<select name='provinsi' class='c-font-ui c-font-12'>
										<option value=''>Nama Provinsi</option>
										<option value='01'>Jawa Barat</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Kota</td>
								<td>
									<select name='kota' class='c-font-ui c-font-12'>
										<option value=''>Nama Kota</option>
										<option value='01'>Kota Cimahi</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Kecamatan</td>
								<td>
									<select name='kecamatan' class='c-font-ui c-font-12'>
										<option value=''>Nama Kecamatan</option>
										<option value='01'>Cimahi Utara</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Nomor Handphone</td>
								<td>
									<p class='c-b-t-b-l-grey c-f-left c-p-all-5 c-font-10'>+62</p>
									<input type='text' name='kirim-hp' style='width:155px'>
								</td>
							</tr>
							<tr>
								<td colspan='2' align='right'>
									<input type='submit' value='Lanjutkan' style='margin-right:30px'>
								</td>
							</tr>
						</form>
					</table>
					<div class='c-clean'></div>		
				</div>
				<div class='c-right-side-10 c-m-t-10 c-b-a-light-grey'>
					<p class='c-f-left c-b-b-light-grey c-text-a-left c-tt-c' style='width:270px;padding:5px;'><b>Detil Order </b>(2 Barang)</p>
					<table id='right-side-check-2' cellpadding='5'>
						<thead class='c-back-light-grey c-tt-u c-font-10'>
							<td width='100px'>Produk</td>
							<td width='40px'>Jumlah</td>
							<td class='c-text-a-right'>Harga</td>
						</thead>
						<tr valign='top'>
							<td class='c-font-10'>Nama Barangnya kalau panjang ...</td>
							<td class='c-font-10'>1</td>
							<td class='c-font-10 c-tt-u c-text-a-right'>Rp. 1.500.000</td>
						</tr>
						<tr valign='top'>
							<td class='c-font-10'>Nama Baran ...</td>
							<td class='c-font-10'>1</td>
							<td class='c-font-10 c-tt-u c-text-a-right'>Rp. 1.500.000</td>
						</tr>
						<div class='c-clean'></div>
					</table>

					<table id='right-side-check-2' cellpadding='5'>
						<tr style='border:0px;' class='c-font-10'>
							<td>Subtotal</td>
							<td width='150px' class='c-text-a-right'>Rp. 3.000.000</td>
						</tr>
						<tr style='border:0px;' class='c-font-10'>
							<td class='c-font-10'><b>Total</b><br>(Termasuk PPN)</td>
							<td width='150px' class='c-text-a-right c-font-12 c-tt-u c-color-pink'>Rp. 3.000.000</td>
						</tr>
					</table>
					<a href="pages.php?pages=checkout-4" id='button-1' class='c-back-yellow'>Lanjutkan</a>
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