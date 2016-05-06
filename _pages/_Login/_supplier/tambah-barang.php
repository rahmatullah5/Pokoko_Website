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
		<title>Tambah Barang</title>
		<link rel='icon' type='../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/style_back_end.css">

		<link rel="stylesheet" href="../_plugin/bootag/bootstrap-tagsinput.css">
	    <link rel="stylesheet" href="../_plugin/bootag/app.css">

		<script type="text/javascript" src="../_plugin/_js/tinymce/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
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
					<p id='title-main-admin' class='c-bor-bot-3 c-bor-color-yellow'>Tambah Barang Penjual</p>
					<table id='add-brg' cellpadding='5' border='0'>
						<form enctype='multipart/form-data' method='post' action='../_plugin/_config/proses.php?p=add-barang'>
						<tr>
							<td>Kode Barang</td>
							<td>
								<?php
									$b=0;
									$f=0;
									$s=0;
									$a = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","X","Y","Z");
									$a2 = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","X","Y","Z");
									do{
										$b = rand(0,25);
										$s = rand(0,25);
										$f = strval(rand(1,9999));
										$kodenya = $a[$b].$f.$a2[$s];
										$que = mysql_query("SELECT * FROM product where id='$kodenya'");
										$cek = mysql_num_rows($que);
										if ($cek > 0) {
											continue;
										}
										elseif($a[$b]==""||$a2[$s]==""){
											continue;
										}
										else{
											echo ": ".$kodenya;
											$_SESSION['kode-add-barang']=$kodenya;
											break;
										}
									}while ($cek<0)
								?>
							</td>
						</tr>
						<tr>
							<td>Kategori</td>
							<td>: 
								<select name='pilih-kategori' id='combo-normal' required>
								<?php
									$query = mysql_query("SELECT * FROM category order by category asc");
									while ($data=mysql_fetch_array($query)) {
										echo "<option value='$data[id]'>$data[category]</option>";
									}
								?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Nama Barang</td>
							<td>: <input type='text' name='add-nama-brg' required></td>
						</tr>
						<tr>
							<td>Harga</td>
							<td>
								<p class='c-f-left'>:</p>
								<p class='c-b-t-b-l-grey c-f-left c-p-all-5 c-font-10' style='margin-left:5px;height:21px;'>Rp.</p>
								<input type='number' name='add-price-brg' style='width:250px;' required>
							</td>
						</tr>
						<tr>
							<td>Stok</td>
							<td>: <input type='number' name='add-stok-brg' required style='width:50px;'></td>
						</tr>
						<tr>
							<td>Deskripsi Barang</td>
							<td><textarea name='add-desc-brg' style='resize:none'></textarea></td>
						</tr>
						<tr>
							<td>Label Barang</td>
							<td><input type="text" data-role="tagsinput" name="tag"></td>
						</tr>
						<tr>
							<td>Gambar Barang</td>
							<td>: <input type='file' name='add-img-brg'></td>
						</tr>
						<tr>
							<td colspan='2'><input type='submit' value='Simpan Data' id='edit-button' style='width:130px;padding-left:30px;color:#fff'></td>
						</tr>
						</form>
						<div class='c-clean'></div>
					</table>
				</div>
				<!-- KATEGORI BODY END -->
				<div class='c-clean'></div>
			</div>	
			<div class='c-clean'></div>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
	    <script src="../_plugin/bootag/bootstrap-tagsinput.min.js"></script>
	    <script src="../_plugin/bootag/bootstrap-tagsinput/bootstrap-tagsinput-angular.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>
	    <script src="assets/app.js"></script>
	    <script src="assets/app_bs3.js"></script>
	</body>
</html>