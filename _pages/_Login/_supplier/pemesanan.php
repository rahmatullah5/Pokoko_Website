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
							$query = mysql_query("SELECT * FROM product p, user u, order_product op, product_detail pd WHERE p.id=pd.id_product and p.id_supplier=u.id AND p.id=op.id_product AND u.id='$_COOKIE[uid]'");
							while ($data_pro = mysql_fetch_array($query)) {
								$b = $data_pro['desk'];
								$desc_sub = substr($b, 0,200);
								$rate=$data_pro['rating']/$data_pro['rater'];
								echo "
									<tr>
										<td>$data_pro[id_product]</td>
										<td><span class='c-f-left c-tt-n'>$data_pro[name]</span></td>
										<td>$data_pro[qty]</td>
										<td>$rate</td>
										<td>$data_pro[status]</td>
									</tr>
								";
							}
						?>
						<div class='c-clean'></div>
					</table>
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