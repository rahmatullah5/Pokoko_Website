<!DOCTYPE html>
<?php
	$que_utama 	= mysql_query("SELECT * FROM user where id='$_COOKIE[uid]'");
	$data_utama	= mysql_fetch_array($que_utama);

	function tanggal() {
		$jam = date("H:i",time() + (60 * 60 * 7));
		$tanggal = date("j",time() + 60 * 60 * 7);
		$tahun = date("Y",time() + 60 * 60 * 7);				
		// Ucapan Selamat Pagi/Siang/Malam
		$ambil_waktu = date("H",time() + 60 * 60 * 7);
		if($ambil_waktu > 3 and $ambil_waktu <= 12) $tulis_waktu = "Selamat Pagi!";
		elseif($ambil_waktu > 12 and $ambil_waktu <= 15) $tulis_waktu = "Selamat Siang!";
		elseif($ambil_waktu > 15 and $ambil_waktu <= 18) $tulis_waktu = "Selamat Sore!";
		else $tulis_waktu = "Selamat Malam!";
							
		return "$tulis_waktu";
	}
?>
<html>
	<head>
		<title>Daftar Barang</title>
		<link rel='icon' type='../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/style_back_end.css">
		<script type="text/javascript">
			function startTime()
			{ 	var today=new Date();
				var weekday=new Array(7);
				var weekday=["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"];
				var monthname=new Array(12);
				var monthname=["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
				var dayname=weekday[today.getDay()];
				var day=today.getDate();
				var month=monthname[today.getMonth()]; 
				var year=today.getFullYear();
				var h=today.getHours();
				var m=today.getMinutes();
				var s=today.getSeconds();
				h=checkTime(h);
				m=checkTime(m);
				s=checkTime(s);
				document.getElementById('clocktime').innerHTML=dayname+", "+day+" "+month+" "+year+" | "+h+":"+m+":"+s;
				t=setTimeout(function(){startTime()},500);
			}
			// function checkTime to add a zero in front of numbers < 10
			function checkTime(i)
			{	if(i<10){i="0"+i;}
				return i;
			}
		</script>
	</head>
	<body onload="startTime()">
		<div class='c-main-wrapper'>
			<?php
				include "sidebar-supplier.php"
			?>
			<div id='main-back-end'>
				<?php include "header-supplier.php";?>
				<!-- KATEGORI BODY START -->
				<div id='child-main'>
					<p id='title-main-admin' class='c-bor-bot-3 c-bor-color-yellow'>Daftar Barang Yang Anda Jual</p>
					<p id='desc-t-main-admin'>Lihat daftar barang, hapus barang, tambah stok, ataupun tambah barang baru.</p>
					<table border='1'  cellpadding='5' class='c-stripe-tr'>
						<tr class='c-back-pink c-color-light'>
							<td>ID Barang</td>
							<td><span class='c-f-left c-color-light'>Nama Barang</span></td>
							<td>Harga</td>
							<td width='50px'>Rating</td>
							<td width='90px'>Aksi</td>
						</tr>
						<?php
							$query = mysql_query("SELECT * FROM product p,product_detail pd,product_image pi where p.id=pd.id_product AND p.id=pi.id_product");
							while ($data_pro = mysql_fetch_array($query)) {
								$b = $data_pro['description'];
								$desc_sub = substr($b, 0,200);
								$rate = $data_pro['rating']/$data_pro['rater'];
								echo "
									<tr>
										<td>$data_pro[id_product]</td>
										<td><span class='c-f-left c-tt-n'>$data_pro[name]</span></td>
										<td>$data_pro[price]</td>
										<td>$rate</td>
										<td><a href='#detil_barang?id=$data_pro[id]' class='c-tt-n c-hov-underline c-color-dark-blue'>Detil Barang</a></td>
									</tr>

									<a href='#x' class='overlay' id='detil_barang?id=$data_pro[id]'></a> 
									<div class='popup'> 
										<p class='c-text-a-left c-p-all-10 c-tt-c c-back-dark-blue c-color-light c-font-15'>$data_pro[name]</p>
										<div id='main-popup-sup'>
											<img src='../_img/_barang/$data_pro[image]' class='c-f-left'>
											<div class='c-f-left' style='background-color:;width:370px;height:300px;margin-left:10px;'>
												<p class='c-back-dark-blue'><span class='c-f-left'>Harga : Rp. $data_pro[price]</span><span class='c-f-right'>Stok : $data_pro[stock]</span></p>
												<div id='for-star-2'>
													<img src='../_img/star3.png'>
													<img src='../_img/star3.png'>
													<img src='../_img/star3.png'>
													<img src='../_img/star2.png'>
													<img src='../_img/star.png'>
													<p>Rating: $rate</p>
												</div>
												<p class='c-font-15'>Deskripsi</p>
												<div class='c-f-left' style='width:370px;height:150px;margin:10px 0px 10px 0px;'>
													".$desc_sub."
												</div>
												<a href='../_plugin/_config/proses.php?p=hapus-barang&id-barang=$data_pro[id]'><button id='delete-button' class='c-f-left'><p>Hapus</p></button></a>
												<a href='page-panel.php?page=edit-barang&id-barang=$data_pro[id_product]'><button id='edit-button' class='c-f-left c-m-l-10'><p>Sunting</p></button></a>
											</div>
										</div>
									</div>
									<a class='close' href='#close'></a>
								";
							}
						?>
						<div class='c-clean'></div>
					</table>
					<a href='page-panel.php?page=tambah-barang-sup'><button id='green-button' class='c-f-right c-m-t-10' style='right:28%;position:relative;width:170px;'><p>Tambah Barang</p></button></a> 
						<div class='c-clean'></div>
					</div> 
				</div>
				<!-- KATEGORI BODY END -->
				<div class='c-clean'></div>
			</div>	
			<div class='c-clean'></div>
		</div>
	</body>
</html>