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
		<title>Sunting Kategori</title>
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
				include "sidebar-admin.php"
			?>
			<div id='main-back-end'>
				<?php include "header-admin.php";?>
				<!-- KATEGORI BODY START -->
				<div id='child-main'>
					<p id='title-main-admin' class='c-bor-bot-3 c-bor-color-yellow'>Daftar Kategori Barang</p>
					<p id='desc-t-main-admin'>Lihat daftar kategori barang, hapus kategori barang ataupun tambah kategori baru.</p>
					<table border='1'  cellpadding='5'>
						<tr>
							<td rowspan='2' width='50px'>ID</td>
							<td rowspan='2' width='300px'>Kategori</td>
							<td rowspan='2'>Icon Kategori</td>
							<td colspan='2'>Aksi</td>
						</tr>
						<tr>
							<td width='115px'>Hapus</td>
							<td width='115px'>Sunting</td>
						</tr>
						<?php
							$que = mysql_query("SELECT * FROM category");
							while($data=mysql_fetch_array($que)){
								echo "
									<tr>
										<td>$data[id].</td>
										<td class='c-tt-n data-kategori' id=''><span class='c-f-left'>$data[category]</span></td>
										<td><img src='../_img/icon/category/$data[image]' style='height:50px;'></td>
										<td><a href='../_plugin/_config/proses.php?p=hapus-kategori&id-kat=$data[id]'><button class='delete-button' id='$data[id]'><p>Hapus</p></button></a></td>
										<td><a href='#sunting-kat?id=$data[id]'><button class='edit-button'><p>Sunting</p></button></a></td>
									</tr>
									<a href='#x' class='overlay' id='sunting-kat?id=$data[id]'></a> 
									<div class='popup' style='width:300px;'> 
										<p class='c-text-a-left c-p-all-10 c-tt-c c-back-dark-blue c-color-light c-font-15'>Sunting Kategori $data[category]</p>
										<div id='edit-kat-min'>
										<form method='post' enctype='multipart/form-data' action='../_plugin/_config/proses.php?p=edit-kat&id-kat=$data[id]'>
											<input type='text' name='sunting-kat' value='$data[category]'>
											<input type='file' name='add-img-brg'>
											<input type='submit' value='Sunting Data'>
										</form>
										</div>
									</div>
									
								";
							}
						?>
						<tr id='collapse1' style='display:none;'>
							<form method='post' enctype='multipart/form-data' action='../_plugin/_config/proses.php?p=add-kategori'>
								<td></td>
								<td>
									<input type='text' name='add_category' class='flat-input' placeholder='Tambah Kategori Baru'>
								</td>
								<td  width='100px'>
									<input type='file' name='file'>
								</td>
								<td>
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
					<div id='page-12'>
						<a href=""><</a>
						<a href="" class='activate'>1</a>
						<a href="">2</a>
						<a href="">3</a>
						<a href="">4</a>
						<a href="">5</a>
						<a href="">6</a>
						<a href="">></a>
					</div>
				</div>
				<!-- KATEGORI BODY END -->
				<div class='c-clean'></div>
			</div>	
			<div class='c-clean'></div>
		</div>
	</body>
</html>