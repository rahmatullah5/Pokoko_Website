<?php
	$id_brg = $_GET['id-barang'];
	$que_det_brg = mysql_query("SELECT p.id as id,c.category as kategorinya ,pd.name as name,pd.price as price,pd.description as desk,pd.stock as stok,pi.image as imgnya  FROM product p,product_detail pd,product_image pi,category c where p.id=pd.id_product AND p.id=pi.id_product AND p.id_category=c.id AND p.id='$id_brg'");
	$data_det_brg = mysql_fetch_array($que_det_brg);
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $data_det_brg['name']?></title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="e-commerce, pokoko, TokoOnline, ILoveIndonesia, IndonesianProduct">
		<meta name="description" content="Toko Online Pokoko. Mudah Bayarnya, Aman Belinya dan Terbaik Harganya">
		<meta name="author" content="Fitri Andriyani">
		<link rel='icon' type='../../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/style_main.css">
		<!--Flickerplate js-->
		<script type="text/javascript" src="../_plugin/_js/jquery.min.js"></script>
	    <script type="text/javascript">
		  $(document).ready(function() {
		        //move he last list item before the first item. The purpose of this is if the user clicks to slide left he will be able to see the last item.
		        $('#carousel_ul li:first').before($('#carousel_ul li:last')); 
		        
		        
		        //when user clicks the image for sliding right        
		        $('#right_scroll img').click(function(){
		        
		            //get the width of the items ( i like making the jquery part dynamic, so if you change the width in the css you won't have o change it here too ) '
		            var item_width = $('#carousel_ul li').outerWidth() + 0;
		            
		            //calculae the new left indent of the unordered list
		            var left_indent = parseInt($('#carousel_ul').css('left')) - item_width;
		            
		            //make the sliding effect using jquery's anumate function '
		            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){    
		                
		                //get the first list item and put it after the last list item (that's how the infinite effects is made) '
		                $('#carousel_ul li:last').after($('#carousel_ul li:first')); 
		                
		                //and get the left indent to the default -210px
		                $('#carousel_ul').css({'left' : '0px'});
		            }); 
		        });
		        
		        //when user clicks the image for sliding left
		        $('#left_scroll img').click(function(){
		            
		            var item_width = $('#carousel_ul li').outerWidth() + 0;
		            
		            /* same as for sliding right except that it's current left indent + the item width (for the sliding right it's - item_width) */
		            var left_indent = parseInt($('#carousel_ul').css('left')) + item_width;
		            
		            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){    
		            
		            /* when sliding to left we are moving the last item before the first list item */            
		            $('#carousel_ul li:first').before($('#carousel_ul li:last')); 
		            
		            /* and again, when we make that change we are setting the left indent of our unordered list to the default -210px */
		            $('#carousel_ul').css({'left' : '0px'});
		            });
		            
		            
		        });
		  });
		</script>
	</head>

	<body>
		<div class='c-main-wrapper' align='center'>
			<?php
				include "header-3.php";
			?>
			<div id='header-4' class='c-main-wrapper c-b-b-light-grey' style='padding-top:65px;' align='center'>
				<div class='c-wrapper-12' style='height:70px;'>
					<form method='post' action=''>
						<ul>
							<li>
								<p class='c-f-left c-text-a-left c-font-15 c-font-bell c-color-pink' style='margin:-8px 0px 0px 0px;width:290px;'><?php echo $data_det_brg['kategorinya']?></p>
							</li>
							<li>
								<select name='filter-wish' class='c-font-ui c-font-12' style='margin:15px 0px 0px 10px'>
									<option value=''>Urutkan Berdasarkan</option>
									<option value='name-A-Z'>Nama Barang A - Z</option>
									<option value='name-Z-A'>Nama Barang Z - A</option>
									<option value='rating-1-5'>Rating 1 - 5</option>
									<option value='rating-5-1'>Rating 5 - 1</option>
									<option value='terbaru'>Baru Ditambahkan</option>
									<option value='terlama'>Sudah Lama Ditambahkan</option>
								</select>
								<input type='text' name='start-price' placeholder='0' class='price-nav' style='margin:10px 0px 0px -10px;'>
								<p class='c-f-left' style='margin:15px 5px 0px 5px;'>Sampai</p>
								<input type='text' name='end-price' placeholder='10000000' class='price-nav' style='margin:10px 0px 0px 0px;'>
								<input type='submit' value='Filter Barang' id='button-1' class='c-trans-normal c-back-yellow' style='margin:10px 0px 0px 10px;'>
							</li>
							<li>
								<div id='cont-view'>
									<div class='c-b-a-light-grey c-shadow-1'>
										<a href=""><img src="../_img/icon/grid-view.png"></a>
									</div>
									<div>
										<a href=""><img src="../_img/icon/list-view.png"></a>
									</div>
								</div>
							</li>
							<li class='c-f-right' style='border:0px;'>
								<ul id='dropdown-kat' style='height:60px;'>
									<a href="">
										<li class='c-tt-u c-p-all-10 c-back-dark-blue c-color-light' style='border:0px;height:25px;'>
											<span class='c-color-light'>Kategori Barang</span>
											<ul>
												<?php
													$que_kategori = mysql_query("SELECT * FROM category");
													while ($data_kat=mysql_fetch_array($que_kategori)) {
														echo "
														<a href=''>
															<li>
																<img class='c-f-left' src='../_img/icon/category/$data_kat[image]' style='height:30px;'>
																<p class='c-f-left'>$data_kat[category]</p>
															</li>
														</a>
														";
													}
												?>
												<div class='clean'></div>
											</ul>
										</li>
									</a>
								</ul>
							</li>
						</ul>
					</form>
					<div class='c-clean'></div>
				</div>
				<div class='c-clean'></div>
			</div>
			<div class='c-wrapper-12' style='margin-top:0px;'>
				<div id='detail-barang'>
					<div id='gambar' style='background: #fff url(../_img/_barang/<?php echo $data_det_brg['imgnya'] ?>) center center no-repeat;background-size:cover;'></div>
					<div id='detail-barang-2' class='c-f-right'>
						<p class='c-f-left'><?php echo $data_det_brg['name']?></p>
						<ul>
							<li class='c-back-dark-blue'>
								<span class='c-f-left c-font-size-15 c-text-a-left c-color-light' style='margin:7px 0px 0px 10px;'>Rp. <?php echo $data_det_brg['price']?>,00</span>
							</li>
							<li class='c-back-grey'>
								<div id='for-star-1' class='c-f-left' style='margin-top:10px;margin-left:5px;width:155px;'>
									<img src="../_img/star3.png">
									<img src="../_img/star3.png">
									<img src="../_img/star3.png">
									<img src="../_img/star2.png">
									<img src="../_img/star.png">
									<p>(3.5)</p>
								</div>
							</li>
							<li class='c-back-yellow'>
								<span class='c-f-left c-font-size-15 c-text-a-left' style='margin:7px 0px 0px 10px;'>Total Review : 12345</span>
							</li>
							<a href="" id='add-chart-3' class='c-back-pink'><li>
								<span class='c-f-left c-font-size-15 c-text-a-left c-color-light' style='margin:7px 0px 0px 10px;'>Tambah ke Troli!</span>
								<img src="../_img/chart-small.png" class='c-f-left'>
							</li></a>
							<?php
								$query_wish = mysql_query("SELECT * from wishlist w, product p, user u where w.id_product=p.id AND u.id=w.id_user AND u.id='$_COOKIE[uid]' AND p.id='$id_brg'");
								$cek = mysql_num_rows($query_wish);
								if($cek>0){
									echo "
									<a href='../_plugin/_config/proses.php?p=delete-wish&id-barang=$data_det_brg[id]' id='add-wish-1' class='c-back-light-blue c-hover-back-p'><li>
										<span class='c-f-left c-font-size-15 c-text-a-left c-color-light' style='margin:7px 0px 0px 10px;'>Hapus Dari Wish List !</span>
										<img src='../_img/icon/pin-small.png'class='c-f-left'>
									</li></a>
									";
								}
								else{
									echo "
									<a href='../_plugin/_config/proses.php?p=add-to-wish&id-barang=$data_det_brg[id]' id='add-wish-1' class='c-back-light-blue'><li>
										<span class='c-f-left c-font-size-15 c-text-a-left c-color-light' style='margin:7px 0px 0px 10px;'>Tambah ke Wish List!</span>
										<img src='../_img/icon/pin-small.png'class='c-f-left'>
									</li></a>
									";
								}

							?>
						</ul>
						<div class='c-clean'></div>
					</div>

					<div id='desc-brg'>
						<p class='c-f-left c-text-a-left c-font-15' style='width:650px;margin-bottom:10px;'>Penjelasan Barang : </p>
						<div style='width:880px;height:auto;float:left' class='c-text-a-justify'>
							<?php echo $data_det_brg['desk']?>
							<div class='c-clean'></div>
						</div>
						<div class='c-clean'></div>
					</div>
					<div class='c-clean'></div>
				</div>
				<!--SEARCH HISTORY START-->
				<div class='c-wrapper-12' id='search-history-1'>
					<p>Pelanggan dengan minat yang sama juga melihat</p>
				    <div id='carousel-container'>
				      <div id='left_scroll'><img src='../_img/carousel/left.png' style='height:40px' /></div>  
				      <div id='carousel_inner'>  
				            <ul id='carousel_ul'>  
				                <li>
				                	<a href='#'>
				                		<div id='img-history'>
				                			<img src="../_img/_barang/3_front.png">
				                		</div>
				                		<p class='c-text-a-left c-tt-c c-bold'>Nama barangnya kalau panjang gimana yaa muat gk ya?</p>
				                		<p class='c-text-a-left c-color-dark-blue c-bold'>Rp. 150.000,00</p>
				                		<p class='c-text-a-left' style='font-size:10pt'>Rating : 4.5 | 12345 (review)</p>
				                		<p class='c-p-all-5 c-back-yellow' id='add-chart-2'>BELI SEKARANG</p>
				                	</a>
				                </li>  
				                <li>
				                	<a href='#'>
				                		<div id='img-history'>
				                			<img src="../_img/_barang/32.jpg">
				                		</div>
				                		<p class='c-text-a-left c-tt-c c-bold'>Nama barangnya kalau panjang gimana yaa muat gk ya?</p>
				                		<p class='c-text-a-left c-color-dark-blue c-bold'>Rp. 150.000,00</p>
				                		<p class='c-text-a-left' style='font-size:10pt'>Rating : 4.5 | 12345 (review)</p>
				                		<p class='c-p-all-5 c-back-yellow' id='add-chart-2'>BELI SEKARANG</p>
				                	</a>
				                </li>  
				                <li>
				                	<a href='#'>
				                		<div id='img-history'>
				                			<img src="../_img/_barang/1.jpg">
				                		</div>
				                		<p class='c-text-a-left c-tt-c c-bold'>Nama barangnya kalau panjang gimana yaa muat gk ya?</p>
				                		<p class='c-text-a-left c-color-dark-blue c-bold'>Rp. 150.000,00</p>
				                		<p class='c-text-a-left' style='font-size:10pt'>Rating : 4.5 | 12345 (review)</p>
				                		<p class='c-p-all-5 c-back-yellow' id='add-chart-2'>BELI SEKARANG</p>
				                	</a>
				                </li>  
				                <li>
				                	<a href='#'>
				                		<div id='img-history'>
				                			<img src="../_img/_barang/33.jpg">
				                		</div>
				                		<p class='c-text-a-left c-tt-c c-bold'>Nama barangnya kalau panjang gimana yaa muat gk ya?</p>
				                		<p class='c-text-a-left c-color-dark-blue c-bold'>Rp. 150.000,00</p>
				                		<p class='c-text-a-left' style='font-size:10pt'>Rating : 4.5 | 12345 (review)</p>
				                		<p class='c-p-all-5 c-back-yellow' id='add-chart-2'>BELI SEKARANG</p>
				                	</a>
				                </li>  
				                <li>
				                	<a href='#'>
				                		<div id='img-history'>
				                			<img src="../_img/_barang/13.jpg">
				                		</div>
				                		<p class='c-text-a-left c-tt-c c-bold'>Nama barangnya kalau panjang gimana yaa muat gk ya?</p>
				                		<p class='c-text-a-left c-color-dark-blue c-bold'>Rp. 150.000,00</p>
				                		<p class='c-text-a-left' style='font-size:10pt'>Rating : 4.5 | 12345 (review)</p>
				                		<p class='c-p-all-5 c-back-yellow' id='add-chart-2'>BELI SEKARANG</p>
				                	</a>
				                </li>  
				                <li>
				                	<a href='#'>
				                		<div id='img-history'>
				                			<img src="../_img/_barang/2.jpg">
				                		</div>
				                		<p class='c-text-a-left c-tt-c c-bold'>Nama barangnya kalau panjang gimana yaa muat gk ya?</p>
				                		<p class='c-text-a-left c-color-dark-blue c-bold'>Rp. 150.000,00</p>
				                		<p class='c-text-a-left' style='font-size:10pt'>Rating : 4.5 | 12345 (review)</p>
				                		<p class='c-p-all-5 c-back-yellow' id='add-chart-2'>BELI SEKARANG</p>
				                	</a>
				                </li>  
				            </ul>  
				      </div>  
				      <div id='right_scroll'><img src='../_img/carousel/right.png' style='height:40px'/></div>
				    </div>
				    <div class='c-clean'></div>
				</div>
				<!--SEARCH HISTORY END-->
				<div class='c-clean'></div>
			</div>
			<?php
				include "footer.php";
			?>
			<div class='c-clean'></div>
		</div>
	</body>
</html>