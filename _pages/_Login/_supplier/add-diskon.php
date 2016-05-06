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
		<title>Tambah Barang Featured</title>
		<link rel='icon' type='../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/style_back_end.css">
		<script type="text/javascript" src="../_plugin/_js/1.7.2.js"></script>
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
		<script>
			$(document).ready(function() {
			  $('.nav-toggle').click(function(){
				//get collapse content selector
				var collapse_content_selector = $(this).attr('href');					
						
				//make the collapse content to be shown or hide
				var toggle_switch = $(this);
				$(collapse_content_selector).toggle(function(){
				  if($(this).css('display')=='none'){
	                                //change the button label to be 'Show'
					toggle_switch.html('+');
				  }else{
	                                //change the button label to be 'Hide'
					toggle_switch.html('-');
				  }
				});
			  });			
			});	
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
					<p id='title-main-admin' class='c-bor-bot-3 c-bor-color-yellow'>Daftar Barang Featured</p>
					<p id='desc-t-main-admin' class='c-tt-c '>Lihat data Barang Featured / barang yang diutamakan, hapus status Featured atau tambah status featured pada barang</p>
					<table border='1'  cellpadding='5' class='c-stripe-tr'>
						<tr class='c-back-dark-blue c-color-light'>
							<td width='50px'>No.</td>
							<td>ID Produk</td>
							<td>Nama Barang</td>
							<td>Status</td>
							<td width='50px'>AKSI</td>
						</tr>
						<?php
							$query_data = mysql_query("SELECT * FROM product p, product_detail pd, product_discount pdi WHERE p.id=pd.`id_product` AND pdi.`id_product`=p.id AND pdi.`discount`>0");
							$cek = mysql_num_rows($query_data);
							if ($cek==0) {
								echo "
									<tr>
										<td colspan='5'>Belum Ada barang yang menjadi Featured</td>
									</tr>
								";
							}
							else{
								$no = 1;
								while ($data_featured = mysql_fetch_array($query_data)) {
									echo "
										<tr>
											<td>".$no."</td>
											<td>$data_featured[id_product]</td>
											<td>$data_featured[name]</td>
											<td>$data_featured[discount]%</td>
											<td><a href='../_plugin/_config/proses.php?p=hapus-diskon&id-brg=$data_featured[id_product]'><button id='delete-button'><p>Hapus</p></button></a></td>
										</tr>
									";
									$no++;
								}
							}
						?>
						<tr id='collapse1' style='display:none;'>
							<form method='post' action='../_plugin/_config/proses.php?p=add-diskon'>
								<td colspan='2'>
									<select name='nama-brg' id='combo-normal'>
										<?php
											$brgnya = mysql_query("SELECT * FROM product p, product_detail pd, product_discount pdi WHERE p.id=pd.`id_product` AND pdi.`id_product`=p.id AND pdi.`discount`=0");
											while ($data_brg=mysql_fetch_array($brgnya)) {
												echo "
													<option value='$data_brg[id_product]'>$data_brg[name]</option>
												";		
											}
										?>
									</select>
								</td>
								<td>
									<input type='number' name='disc' placeholder="0">
								</td>
								<td width='50px'>
									<input type='submit' value='Simpan'>
								</td>
								<td>
									<input type='reset' value="Reset">
								</td>
							</form>
						</tr>
						<tr id='tambah' class='border-0' style='border:0px;'>
							<td colspan='5' style='text-align:right' href="#collapse1" class="nav-toggle" style='border:0px;'>+</td>
						</tr>
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