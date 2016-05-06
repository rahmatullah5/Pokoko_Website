<?php
	$kategori = $_GET['id-kategorinya'];
	$data = mysql_query("SELECT * FROM category where id='$kategori'");
	$data2 = mysql_fetch_array($data);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Daftar Barang Kategori : <?php echo $data2['category'];?></title>
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
							<li style='width:290px;'>
								<p class='c-f-left c-font-15 c-font-bell c-color-pink' style='margin:-8px 0px 0px 0px'><?php echo $data2['category'];?></p>
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
									<a href=''>
										<li class='c-tt-u c-p-all-10 c-back-dark-blue c-color-light' style='border:0px;height:25px;'>
											<span class='c-color-light'>Kategori Barang</span>
											<ul>
												<?php
													$que = mysql_query("SELECT * FROM category");
													while ($data_kat=mysql_fetch_array($que)) {
														echo "
															<a href='pages.php?pages=kategori&id-kategorinya=$data_kat[id]'>
																<li>
																	<img class='c-f-left' src='../_img/icon/category/$data_kat[image]' style='height:30px;'>
																	<p class='c-f-left'>$data_kat[category]</p>
																</li>
															</a>
														";
													}
												?>
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
				<ul id='wish-list-brg'>
					<?php
						$que = mysql_query("SELECT p.id as id,pd.name as name,pd.price as price,pd.description as desk,pd.stock as stok,pi.image as imgnya,pd.rating as rating, pd.rater as rater FROM product p,product_detail pd,product_image pi,category c where p.id=pd.id_product AND p.id=pi.id_product AND c.id=p.id_category AND c.id='$kategori' order by p.tanggal desc");
						$cek = mysql_num_rows($que);
						if ($cek==0) {
							echo "
							<div class='c-wrapper-12' style='height:285px;margin:1px 0px 0px -20px;position:relative'>
								<p class='c-font-bell' style='font-size:40pt;line-height:200px;'>Tidak ada Barang pada kategori ini!</p>
							</div>
							";
						}
						else{
							while ($datanya = mysql_fetch_array($que)) {
								echo "
									<a href='pages.php?pages=detail-barang&id-barang=$datanya[id]'>
										<li>
											<div id='img-wish-list' style='background: #fff url(../_img/_barang/$datanya[imgnya]) top center no-repeat;background-size:cover;height:350px;'>
											</div>
											<div id='ket-wish' class='c-back-grey'>
												<p class='c-f-left c-text-a-left c-bold'>$datanya[name]</p>
												<p class='c-f-left c-text-a-left c-color-pink c-bold' style='width:280px;margin-bottom:10px;'>Rp. $datanya[price],00</p>
												<p class='c-f-left c-text-a-left c-color-dark-blue c-bold' style='margin-top:10px;'>Stok : $datanya[stok]</p>
												<div class='c-clean'></div>
											</div>

											<div class='c-clean'></div>
										</li>
									</a>
								";
							}
						}
					?>
					<!--<p class='c-f-left c-text-a-left'>Wish List : 120 Orang | Review(s) : 44444</p>-->
					<div class='c-clean'></div>
				</ul>
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