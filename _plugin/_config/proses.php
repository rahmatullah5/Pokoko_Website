<?php
	include "koneksi.php";
	switch ($_GET['p']) {
		case 'daftar-beli':
			$email	= htmlspecialchars($_POST['user-d-p']);
			$pass	= md5(htmlspecialchars($_POST['pass-d-p']));

			$que 	= mysql_query("SELECT * from user where email='$email'");
			$cek	= mysql_num_rows($que);
			if($cek==0){
				mysql_query("INSERT into user(email, password, level) values('$email', '$pass', 'user')");
				$que 	= mysql_query("SELECT * from user where email='$email'");
				$db 	= mysql_fetch_array($que);
				mysql_query("INSERT into user_profile(id_user) values('$db[id]')");

				$uid 	= $db['id'];
				setcookie("uid",$uid,time()+(60 * 60 * 24 * 30 * 3),"/");

				echo "<script>window.alert('Anda telah terdaftar.'); window.location=('../../_pages/pages.php?pages=home');</script>";
			} else{
				echo "<script>window.alert('Username telah terdaftar!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			}
		break;
		
		case 'daftar-seller':
			$email	= htmlspecialchars($_POST['user-d-p']);
			$pass	= md5(htmlspecialchars($_POST['pass-d-p']));

			$que 	= mysql_query("SELECT * from user where email='$email'");
			$cek	= mysql_num_rows($que);
			if($cek==0){
				mysql_query("INSERT into user(email, password, level) values('$email', '$pass', 'supplier')");
				$que 	= mysql_query("SELECT * from user where email='$email'");
				$db 	= mysql_fetch_array($que);
				mysql_query("INSERT into user_profile(id_user) values('$db[id]')");

				$uid 	= $db['id'];
				setcookie("uid",$uid,time()+(60 * 60 * 24 * 30 * 3),"/");
				echo "<script>window.alert('Anda telah terdaftar.'); window.location=('../../_pages/pages.php?pages=home');</script>";
			} else{
				echo "<script>window.alert('Username telah terdaftar!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			}
		break;

		case 'login':
			$email		= htmlspecialchars($_POST['user-main-login']);
			$pass		= md5(htmlspecialchars($_POST['pass-main-login']));

			$que 		= mysql_query("SELECT * from user where email='$email' AND password='$pass'");
			$cek		= mysql_num_rows($que);

			if ($cek > 0) {
				$que 	= mysql_query("SELECT * from user where email='$email'");
				$db 	= mysql_fetch_array($que);
				$uid 	= $db['id'];
				setcookie("uid",$uid,time()+(60 * 60 * 24 * 30 * 3),"/");
				echo "<script>window.alert('Selamat Datang $db[email]!'); window.location=('../../_pages/pages.php?pages=home');</script>";
			}
			else{
				echo "<script>window.alert('Kombinasi Email & Password tidak cocok / salah!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			}
		break;

		case 'login-wishlist':
			$email		= htmlspecialchars($_POST['user-main-login']);
			$pass		= md5(htmlspecialchars($_POST['pass-main-login']));

			$que 		= mysql_query("SELECT * from user where email='$email' AND password='$pass'");
			$cek		= mysql_num_rows($que);

			if ($cek > 0) {
				$que 	= mysql_query("SELECT * from user where email='$email'");
				$db 	= mysql_fetch_array($que);
				$uid 	= $db['id'];
				setcookie("uid",$uid,time()+(60 * 60 * 24 * 30 * 3),"/");
				echo "<script>window.alert('Selamat Datang $db[email]!'); window.location=('../../_pages/pages.php?pages=wish-list');</script>";
			}
			else{
				echo "<script>window.alert('Kombinasi Email & Password tidak cocok / salah!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			}
		break;

		case 'keluar':
			echo "<script>window.alert('Anda akan keluar dari sistem!'); window.location=('../../_pages/pages.php?pages=home');</script>";
			$que 	= mysql_query("SELECT * from user where email='$email'");
			$db 	= mysql_fetch_array($que);
			$uid 	= $db['id'];
			setcookie("uid",$uid,time()-3600,"/");
		break;

		#********************************* ADMIN *************************************

		case 'add-kategori':
			$kategori 	= htmlspecialchars($_POST['add_category']);
			$icon_kat	= $_FILES['file']['name'];

			$tujuan = "..\..\_img\icon\category\\".$icon_kat;
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& ($_FILES["file"]["size"] < 5000000)
			&& in_array($extension, $allowedExts)) {
			  if ($_FILES["file"]["error"] > 0) {
				echo "<script>window.alert('Terjadi Kesalahan saat penguploadan Gambar'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			  } else {
				if (file_exists($tujuan)) {
				  echo "<script>window.alert('Maaf gambar yang anda masukan sudah ada dalam database kami!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
				} else {
				  move_uploaded_file($_FILES["file"]["tmp_name"], $tujuan);
				  mysql_query("INSERT into category(category,image) values('$kategori','$icon_kat')");
				  echo "<script>window.alert('Berhasil Menambah Data!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
				  }
			  }
			} else {
				echo "<script>window.alert('GAGAL!!!!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			}

		break;

		case 'add-barang':
			$id_sup		= $_COOKIE['uid'];
			$id_barang 	= $_SESSION['kode-add-barang'];
			$id_kat		= $_POST['pilih-kategori'];
			$nama		= htmlspecialchars($_POST['add-nama-brg']);
			$harga		= htmlspecialchars($_POST['add-price-brg']);
			$stok		= htmlspecialchars($_POST['add-stok-brg']);
			$desc		= $_POST['add-desc-brg'];
			$gambar 	= $_FILES['add-img-brg']['name'];
			$tag		= htmlspecialchars($_POST['tag']);

			$tujuan = "..\..\_img\_barang\\".$gambar;
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["add-img-brg"]["name"]);
			$extension = end($temp);
			if ((($_FILES["add-img-brg"]["type"] == "image/gif")
			|| ($_FILES["add-img-brg"]["type"] == "image/jpeg")
			|| ($_FILES["add-img-brg"]["type"] == "image/jpg")
			|| ($_FILES["add-img-brg"]["type"] == "image/pjpeg")
			|| ($_FILES["add-img-brg"]["type"] == "image/x-png")
			|| ($_FILES["add-img-brg"]["type"] == "image/png"))
			&& ($_FILES["add-img-brg"]["size"] < 5000000)
			&& in_array($extension, $allowedExts)) {
			  if ($_FILES["add-img-brg"]["error"] > 0) {
				echo "<script>window.alert('Terjadi Kesalahan saat penguploadan Gambar'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			  } else {
				if (file_exists($tujuan)) {
				  echo "<script>window.alert('Maaf gambar yang anda masukan sudah ada dalam database kami!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
				} else {
				  move_uploaded_file($_FILES["add-img-brg"]["tmp_name"], $tujuan);
				  mysql_query("INSERT INTO product(id,id_category,id_supplier) values('$id_barang','$id_kat','$id_sup')");
				  mysql_query("INSERT INTO product_detail(id_product,name,price,description,stock) values('$id_barang','$nama','$harga','$desc','$stok')");
				  mysql_query("INSERT INTO product_image(id_product,image) values('$id_barang','$gambar')");
				  mysql_query("INSERT INTO product_discount(id_product) values('$id_barang')");
				  mysql_query("INSERT INTO tags(id_product, tags) values('$id_barang','$tag')");
				  mysql_query("INSERT INTO product_featured(id_product) values('$id_barang')");

				  echo "<script>window.alert('Berhasil Menambah Data!'); window.location=('../../_pages/page-panel.php?page=list-barang');</script>";
				  }
			  }
			} else {
				echo "<script>window.alert('GAGAL!!!!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			}
		break;

		case 'hapus-kategori':
			$id_kat			= $_GET['id-kat'];
			$cari_gambar	= mysql_query("SELECT * FROM category where id='$id_kat'");
			$data_gambar	= mysql_fetch_array($cari_gambar);
			//Tambahin Alert yakin atau tidak
			mysql_query("DELETE FROM category where id='$id_kat'");
			@unlink('../../_img/icon/category/'.$data_gambar['image']);
			echo "<script>window.alert('Berhasil Menghapus Data!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
		break;

		case 'edit-kat':
			$id_katnya = $_GET['id-kat'];
			$nama_kat  = htmlspecialchars($_POST['sunting-kat']);
			$gambar    = $_FILES['add-img-brg']['name'];
			if (empty($gambar)) {
				mysql_query("UPDATE category set category='$nama_kat' where id='$id_katnya'");
				echo "<script>window.alert('Berhasil Mengubah Data!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			}
			else{
				$cari_gambar = mysql_query("SELECT image from category where id='$id_katnya'");
				$data_gambar = mysql_fetch_array($cari_gambar);

				@unlink('../../_img/icon/category/'.$data_gambar['image']);
				
				$tujuan = "..\..\_img\icon\category\\".$gambar;
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["add-img-brg"]["name"]);
				$extension = end($temp);
				if ((($_FILES["add-img-brg"]["type"] == "image/gif")
				|| ($_FILES["add-img-brg"]["type"] == "image/jpeg")
				|| ($_FILES["add-img-brg"]["type"] == "image/jpg")
				|| ($_FILES["add-img-brg"]["type"] == "image/pjpeg")
				|| ($_FILES["add-img-brg"]["type"] == "image/x-png")
				|| ($_FILES["add-img-brg"]["type"] == "image/png"))
				&& ($_FILES["add-img-brg"]["size"] < 5000000)
				&& in_array($extension, $allowedExts)) {
				  if ($_FILES["add-img-brg"]["error"] > 0) {
					echo "<script>window.alert('Terjadi Kesalahan saat penguploadan Gambar'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
				  } else {
					if (file_exists($tujuan)) {
					  echo "<script>window.alert('Maaf gambar yang anda masukan sudah ada dalam database kami!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
					} else {
					  move_uploaded_file($_FILES["add-img-brg"]["tmp_name"], $tujuan);
					  mysql_query("UPDATE category set category='$nama_kat',image='$gambar' where id='$id_katnya'");
					  echo "<script>window.alert('Berhasil Mengubah Data!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
					  }
				  }
				} else {
					echo "<script>window.alert('GAGAL!!!!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
				}
			}
		break;

		case 'hapus-barang':
			$idnya 	= $_GET['id-barang'];
			$cari_gambar = mysql_query("SELECT image from product_image where id_product='$idnya'");
			$data_gambar = mysql_fetch_array($cari_gambar);

			@unlink('../../_img/_barang/'.$data_gambar['image']);
			mysql_query("DELETE FROM product where id='$idnya'");
			mysql_query("DELETE FROM product_detail where id_product='$idnya'");
			mysql_query("DELETE FROM product_image where id_product='$idnya'");
			mysql_query("DELETE FROM product_discount where id_product='$idnya'");
			mysql_query("DELETE FROM product_fetured where id_product='$idnya'");
			mysql_query("DELETE FROM tags where id_product='$idnya'");
			echo "<script>window.alert('Berhasil Menghapus Data!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
		break;

		case 'edit-barang':
			$idnya = $_GET['id-barang'];
			$id_kat = $_POST['pilih-kategori'];
			$nama 	= htmlspecialchars($_POST['edit-nama-brg']);
			$harga 	= htmlspecialchars($_POST['edit-price-brg']);
			$stok 	= htmlspecialchars($_POST['edit-stok-brg']);
			$deskripsi = $_POST['edit-desc-brg'];
			$tag 	= htmlspecialchars($_POST['tag']);

			$gambar 	= $_FILES['add-img-brg']['name'];

			$que = mysql_query("SELECT * from tags where id_product='$idnya'");
			$cekq = mysql_num_rows($que);

			if(empty($gambar)){
				mysql_query("UPDATE product set id_category='$id_kat' where id='$idnya'");
			  	mysql_query("UPDATE product_detail set name = '$nama' , price = '$harga' , description = '$deskripsi' , stock = '$stok' where id_product='$idnya'");
			  	if($cekq==0){
							mysql_query("INSERT into tags(id_product, tags) values('$idnya', '$tag')");
						} else if($cekq>0){
							mysql_query("UPDATE tags set tags='$tag' where id_product='$idnya'");
						}
			  	echo "<script>window.alert('Berhasil Mengubah Data!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			}
			else{
				$cari_gambar = mysql_query("SELECT image from product_image where id_product='$idnya'");
				$data_gambar = mysql_fetch_array($cari_gambar);

				@unlink('../../_img/_barang/'.$data_gambar['image']);
				
				$tujuan = "..\..\_img\_barang\\".$gambar;
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["add-img-brg"]["name"]);
				$extension = end($temp);
				if ((($_FILES["add-img-brg"]["type"] == "image/gif")
				|| ($_FILES["add-img-brg"]["type"] == "image/jpeg")
				|| ($_FILES["add-img-brg"]["type"] == "image/jpg")
				|| ($_FILES["add-img-brg"]["type"] == "image/pjpeg")
				|| ($_FILES["add-img-brg"]["type"] == "image/x-png")
				|| ($_FILES["add-img-brg"]["type"] == "image/png"))
				&& ($_FILES["add-img-brg"]["size"] < 5000000)
				&& in_array($extension, $allowedExts)) {
				  if ($_FILES["add-img-brg"]["error"] > 0) {
					echo "<script>window.alert('Terjadi Kesalahan saat penguploadan Gambar'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
				  } else {
					if (file_exists($tujuan)) {
					  echo "<script>window.alert('Maaf gambar yang anda masukan sudah ada dalam database kami!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
					} else {
					  move_uploaded_file($_FILES["add-img-brg"]["tmp_name"], $tujuan);
					  mysql_query("UPDATE product set id_category='$id_kat' where id='$idnya'");
					  mysql_query("UPDATE product_detail set name = '$nama' , price = '$harga' , description = '$deskripsi' , stock = '$stok' id_product='$idnya'");
					  mysql_query("UPDATE product_image set image='$gambar' where id_product='$idnya'");
					  if($cekq==0){
							mysql_query("INSERT into tags(id_product, tags) values('$idnya', '$tag')");
						} else if($cekq>0){
							mysql_query("UPDATE tags set tags='$tag' where id_product='$idnya'");
						}
					  echo "<script>window.alert('Berhasil Mengubah Data!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
					  }
				  }
				} else {
					echo "<script>window.alert('GAGAL!!!!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
				}
			}
		break;

		case 'main-search':
			$_SESSION['cari'] = htmlspecialchars($_POST['main-search']);
			header("location:../../_pages/_notLogin/searching-data.php");
		break;

		case 'add-to-wish':
			if (!isset($_COOKIE['uid'])) {
				echo "<script>window.alert('Harap Login Terlebih Dahulu'); window.location=('../../_pages/pages.php?pages=login');</script>";
			}
			else{
				$id_brgnya = $_GET['id-barang'];
				$id_sup = $_COOKIE['uid'];

				mysql_query("INSERT into wishlist(id_product,id_user) values('$id_brgnya','$id_sup')");
				header("location:../../_pages/pages.php?pages=detail-barang&id-barang=$id_brgnya");
			}
		break;

		case 'hapus-wish':
			$id_wish = $_GET['wish'];

			//Kalau ada muncul dialogue alert confirm ("ya"/"tidak")
			mysql_query("DELETE FROM wishlist where id = '$id_wish'");
			echo "<script>window.alert('Barang tersebut sudah di hapus dari wishlist anda!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
		break;

		case 'add-featured':
			$id_brg = $_POST['nama-brg'];
			$radionya = $_POST['fea-o-not'];
			if(isset($radionya)){
				mysql_query("INSERT into product_featured(id_product,status) values('$id_brg','$radionya')");
				echo "<script>window.alert('Berhasil Menambah Featured!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			}
			else{
				echo "<script>window.alert('Harap pilih Featured'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			}
		break;

		case 'hapus-featured':
			$id_brg = $_GET['id-brg'];
			//Kalau ada muncul dialogue alert confirm ("ya"/"tidak")
			mysql_query("UPDATE product_featured set status='tidak' where id_product='$id_brg'");

			echo "<script>window.alert('Berhasil Menghapus Featured'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
		break;

		case 'delete-wish':
			$id_brg = $_GET['id-barang'];
			
			mysql_query("DELETE FROM wishlist where id_product='$id_brg' AND id_user='$_COOKIE[uid]'");
			echo "<script>window.alert('Berhasil Menghapus Barang dari Wishlist!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
		break;

		case 'sunting-admin':
			$id 	= $_POST['id'];
			$nama 	= htmlspecialchars($_POST['sunting-nama-min']);
			$phone	= htmlspecialchars($_POST['sunting-phone-min']);
			$gender	= htmlspecialchars($_POST['sunting-gender-min']);
			$gambar    = $_FILES['add-img-brg']['name'];
			
			if (empty($gambar)) {
				mysql_query("UPDATE user_profile set name='$nama', phone='$phone', gender='$gender' where id_user='$id'");
				echo "<script>window.alert('Berhasil Mengubah Data!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			}
			else{
				$cari_gambar = mysql_query("SELECT avatar from user_profile where id_user='$id'");
				$data_gambar = mysql_fetch_array($cari_gambar);

				@unlink('../../_img/icon/avatar/'.$data_gambar['image']);
				
				$tujuan = "..\..\_img\icon\avatar\\".$gambar;
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["add-img-brg"]["name"]);
				$extension = end($temp);
				if ((($_FILES["add-img-brg"]["type"] == "image/gif")
				|| ($_FILES["add-img-brg"]["type"] == "image/jpeg")
				|| ($_FILES["add-img-brg"]["type"] == "image/jpg")
				|| ($_FILES["add-img-brg"]["type"] == "image/pjpeg")
				|| ($_FILES["add-img-brg"]["type"] == "image/x-png")
				|| ($_FILES["add-img-brg"]["type"] == "image/png"))
				&& ($_FILES["add-img-brg"]["size"] < 5000000)
				&& in_array($extension, $allowedExts)) {
				  if ($_FILES["add-img-brg"]["error"] > 0) {
					echo "<script>window.alert('Terjadi Kesalahan saat penguploadan Gambar'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
				  } else {
					if (file_exists($tujuan)) {
					  echo "<script>window.alert('Maaf gambar yang anda masukan sudah ada dalam database kami!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
					} else {
					  move_uploaded_file($_FILES["add-img-brg"]["tmp_name"], $tujuan);
					  mysql_query("UPDATE user_profile set name='$nama', phone='$phone', gender='$gender', avatar='$gambar' where id_user='$id'");
					  echo "<script>window.alert('Berhasil Mengubah Data!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
					  }
				  }
				} else {
					echo "<script>window.alert('GAGAL!!!!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
				}
			}
		break;

		case "add-diskon":
			$id_brg = $_POST['nama-brg'];
			$diskon = htmlspecialchars($_POST['disc']);
			mysql_query("UPDATE product_discount set discount='$diskon' where id_product='$id_brg'");
			echo "<script>window.alert('Berhasil Menambah Diskon'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
		break;

		case "hapus-diskon":
			$id_brg = $_GET['id-brg'];
			//Kalau ada muncul dialogue alert confirm ("ya"/"tidak")
			mysql_query("UPDATE product_discount set discount='0' where id_product='$id_brg'");

			echo "<script>window.alert('Berhasil Menghapus Diskon'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
		break;

		case 'sunting-supplier':
			$id 	= $_POST['id'];
			$nama 	= htmlspecialchars($_POST['sunting-nama-min']);
			$phone	= htmlspecialchars($_POST['sunting-phone-min']);
			$bank	= htmlspecialchars($_POST['sunting-bank-min']);
			$gender	= htmlspecialchars($_POST['sunting-gender-min']);
			$gambar    = $_FILES['add-img-brg']['name'];
			
			if (empty($gambar)) {
				mysql_query("UPDATE user_profile set name='$nama', phone='$phone', gender='$gender', bank_No='$bank' where id_user='$id'");
				echo "<script>window.alert('Berhasil Mengubah Data!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
			}
			else{
				$cari_gambar = mysql_query("SELECT avatar from user_profile where id_user='$id'");
				$data_gambar = mysql_fetch_array($cari_gambar);

				@unlink('../../_img/icon/avatar/'.$data_gambar['image']);
				
				$tujuan = "..\..\_img\icon\avatar\\".$gambar;
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["add-img-brg"]["name"]);
				$extension = end($temp);
				if ((($_FILES["add-img-brg"]["type"] == "image/gif")
				|| ($_FILES["add-img-brg"]["type"] == "image/jpeg")
				|| ($_FILES["add-img-brg"]["type"] == "image/jpg")
				|| ($_FILES["add-img-brg"]["type"] == "image/pjpeg")
				|| ($_FILES["add-img-brg"]["type"] == "image/x-png")
				|| ($_FILES["add-img-brg"]["type"] == "image/png"))
				&& ($_FILES["add-img-brg"]["size"] < 5000000)
				&& in_array($extension, $allowedExts)) {
				  if ($_FILES["add-img-brg"]["error"] > 0) {
					echo "<script>window.alert('Terjadi Kesalahan saat penguploadan Gambar'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
				  } else {
					if (file_exists($tujuan)) {
					  echo "<script>window.alert('Maaf gambar yang anda masukan sudah ada dalam database kami!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
					} else {
					  move_uploaded_file($_FILES["add-img-brg"]["tmp_name"], $tujuan);
					  mysql_query("UPDATE user_profile set name='$nama', phone='$phone', gender='$gender', avatar='$gambar', bank_No='$bank' where id_user='$id'");
					  echo "<script>window.alert('Berhasil Mengubah Data!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
					  }
				  }
				} else {
					echo "<script>window.alert('GAGAL!!!!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
				}
			}
		break;

		case "add-cart":
			$sql = mysql_query("SELECT * FROM cart WHERE id_product='$_GET[id]' AND id_session='$psid' and id_user='$_COOKIE[uid]'");
			$num = mysql_num_rows($sql);
			if ($num==0){
				mysql_query("INSERT into cart(id_product, id_session, qty, id_user) values('$_GET[id]', '$psid', '1', '$_COOKIE[uid]')");
			} else{
				mysql_query("UPDATE cart SET qty = qty + 1 WHERE id_session = '$psid' AND id_product='$_GET[id]' and id_user='$_COOKIE[uid]'");
			}
			echo "<script>window.alert('Berhasil Menambah Ke Troli!'); window.location=('$_SERVER[HTTP_REFERER]');</script>";
		break;
	}
?>