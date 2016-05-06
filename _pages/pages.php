<?php
	include "../_plugin/_config/koneksi.php";
	switch ($_GET['pages']) {
		case 'home':
			include "_notLogin/home.php";
		break;

		case 'login':
			include "_notLogin/login.php";
		break;

		case 'daftar-pembeli':
			include "_notLogin/daftar-pembeli.php";
		break;
		
		case 'daftar-seller':
			include "_notLogin/daftar-seller.php";
		break;

		case 'barang-baru':
			include "_notLogin/new-goods.php";
		break;

		case 'barang-featured':
			include "_notLogin/featured-goods.php";
		break;

		case 'barang-laris':
			include "_notLogin/best-goods.php";
		break;

		case 'barang-diskon':
			include "_notLogin/disc-goods.php";
		break;

		case 'wish-list':
			include "_notLogin/wish-list.php";
		break;

		case 'kategori':
			include "_notLogin/kategori.php";
		break;

		case 'detail-barang':
			include "_notLogin/detail-barang.php";
		break;

		case 'checkout':
			include "_Login/checkout-1.php";
		break;

		case 'checkout-2':
			include "_Login/checkout-2.php";
		break;	

		case 'checkout-3':
			include "_Login/checkout-3.php";
		break;	

		case 'checkout-4':
			include "_Login/checkout-4.php";
		break;

		case 'hasil-cari':
			include "_notLogin/hasil-cari.php";
		break;

		case 'tentang':
			include "_notLogin/tentang.php"	;
		break;

		default:
			include "404.php";
		break;
	}
?>