<?php
	include "../_plugin/_config/koneksi.php";

	switch ($_GET['page']) {
		#********************************** PEMBELI *************************************
		
		#********************************** SUPPLIER *************************************

		case 'dashboard-supplier':
			include "_Login/_supplier/dashboard-supplier.php";
		break;

		case 'list-barang':
			include "_Login/_supplier/list-barang.php";
		break;

		case 'tambah-barang-sup':
			include "_Login/_supplier/tambah-barang.php";
		break;

		case 'edit-barang':
			include "_Login/_supplier/edit-barang.php";
		break;

		case 'diskon-barang':
			include "_Login/_supplier/add-diskon.php";
		break;

		case 'sunting-profil':
			include "_Login/_supplier/sunting-supplier.php";
		break;

		#********************************** ADMIN *************************************
		case 'dashboard-admin':
			include "_Login/_admin/dashboard-admin.php";
		break;

		case 'kategori-admin':
			include "_Login/_admin/kategori-admin.php";
		break;

		case 'add-featured':
			include "_Login/_admin/add-featured.php";
		break;

		case 'sunting-admin':
			include "_Login/_admin/sunting-admin.php";
		break;

		case 'pemesanan-barang':
			include  "_Login/_supplier/pemesanan.php";
		break;

		default:
			include "404.php";
		break;
	}
?>