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
		<title>Sunting Profil</title>
		<link rel='icon' type='../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/style_back_end.css">
		<script type="text/javascript" src="../_plugin/_js/1.7.2.js"></script>
		<script type="text/javascript" src="../_plugin/_js/jquery-1.12.0.min.js"></script>
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
					<p id='title-main-admin' class='c-bor-bot-3 c-bor-color-yellow'>Sunting Profil Penjual</p>
					<table id='add-brg' cellpadding='5' border='0' style='width:300px;'>
						<form enctype='multipart/form-data' method='post' action='../_plugin/_config/proses.php?p=sunting-supplier'>
						<?php
							$que_user = mysql_query("SELECT * FROM user u,user_profile up where u.id=up.id_user AND u.id='$_COOKIE[uid]'");
							$data = mysql_fetch_array($que_user);
						?>
						<tr>
							<td>Email Pengguna</td>
							<td  class='c-tt-n'>: <?php echo $data['email']?> <input name="id" type="hidden" value=<?php echo "$data[id_user]" ?>> </td>
						</tr>
						<tr>
							<td>Nama Lengkap</td>
							<td>
								<?php
									$cek = $data['name'];
									if($cek!=""){
										echo "
										<input type='text' name='sunting-nama-min' value='$data[name]'>
										";
									}
									else{
										echo "
										<input type='text' name='sunting-nama-min' placeholder='Nama Lengkap Pengguna'>
										";
									}
								?>
							</td>
						</tr>
						<tr>
							<td>No. Telepon</td>
							<td>
								<p class='c-b-t-b-l-grey c-f-left c-p-all-5'>+62</p>
								<?php
									$cek_no = $data['phone'];
									if ($cek_no!="") {
										echo "
											<input type='text' name='sunting-phone-min' value='$data[phone]' style='width:240px;'>
										";
									}
									else{
										echo "
											<input type='text' name='sunting-phone-min' placeholder='No. telepon Pengguna' style='width:240px;'>
										";
									}
								?>
							</td>
						</tr>
						<tr>
							<td>No. Bank</td>
							<td>
								<?php
									$cek_no = $data['bank_No'];
									if ($cek_no!="") {
										echo "
											<input type='text' name='sunting-bank-min' value='$data[bank_No]' style='width:280px;'>
										";
									}
									else{
										echo "
											<input type='text' name='sunting-bank-min' placeholder='No. telepon Pengguna' style='width:280px;'>
										";
									}
								?>
							</td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td class='c-tt-n'>
								<?php
									$cek_jkel = $data['gender'];
									if ($cek_jkel=="L") {
										echo "
											<input type='radio' name='sunting-gender-min' value='L' checked>Laki Laki
											<input type='radio' name='sunting-gender-min' value='P'>Perempuan
										";
									}
									elseif ($cek_jkel=="P") {
										echo "
											<input type='radio' name='sunting-gender-min' value='L'>Laki Laki
											<input type='radio' name='sunting-gender-min' value='P' checked>Perempuan
										";
									}
									else{
										echo "
											<input type='radio' name='sunting-gender-min' value='L'>Laki Laki
											<input type='radio' name='sunting-gender-min' value='P'>Perempuan
										";
									}
								?>
							</td>
						</tr>
						<tr>
							<td>Foto Profil</td>
							<td class='c-tt-n'>
								<?php
									$cek_foto = $data['avatar'];
									if($cek_foto==""){
										echo "
											Tidak Ada Gambar Sebelumnnya
											<input type='file' name='add-img-brg'>
										";
									}
									else{
										echo "
											Gambar Sebelumnya <img src='../_img/icon/avatar/$data[avatar]' height='30px'>
											<input type='file' name='add-img-brg'>
										";
									}
								?>
							</td>
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
	</body>
</html>