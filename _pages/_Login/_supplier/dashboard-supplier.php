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
		<title>Howdey <?php echo $data_utama['email']?></title>
		<link rel='icon' type='../_img/pokoko_icon.png' href='../_img/pokoko_icon.png'>
		<link rel="stylesheet" type="text/css" href="../_plugin/_css/style_back_end.css">
		<script src="../_plugin/chart/amcharts.js" type="text/javascript"></script>
        <script src="../_plugin/chart/serial.js" type="text/javascript"></script>
        <script src="../_plugin/chart/dark.js" type="text/javascript"></script>
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
          AmCharts.loadJSON = function(url) {
            // create the request
            if (window.XMLHttpRequest) {
              // IE7+, Firefox, Chrome, Opera, Safari
              var request = new XMLHttpRequest();
            } else {
              // code for IE6, IE5
              var request = new ActiveXObject('Microsoft.XMLHTTP');
            }

            // load it
            // the last "false" parameter ensures that our code will wait before the
            // data is loaded
            request.open('GET', url, false);
            request.send();

            // parse adn return the output
            return eval(request.responseText);
          };
        </script>
		<script>
            var chart;
            var legend;

            AmCharts.ready(function () {
                // PIE CHART
                var chartData = AmCharts.loadJSON("../_plugin/chart/data.php");
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.titleField = "date";
                chart.valueField = "value";
                chart.outlineColor = "#FFFFFF";
                chart.type = "serial";
                chart.theme = "dark";
                chart.dataDateFormat = "YYYY-MM-DD";
                
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.inside = true;
                valueAxis.tickLength = 0;
                valueAxis.axisAlpha = 0;
                valueAxis.minimum = 0;
                valueAxis.maximum = 200;
                chart.addValueAxis(valueAxis);

                var graph = new AmCharts.AmGraph();
                graph.dashLength = 4;
                graph.lineColor = "#01C3DF";
                graph.valueField = "value";
                graph.dashLength = 4;
                graph.bullet = "round";
                chart.addGraph(graph);

                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chart.addChartCursor(chartCursor);

                chart.categoryField = "date";
                chart.categoryAxis = {
                    "parseDates": true
                }
                chart.valueScrollbar = {

                }

                // WRITE
                chart.write("chartdiv");
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
				<div id='chart' style="background-color:#3f3f4f; margin-top:-20px;">
					<div id="chartdiv" style="width: 100%; height: 400px;"></div>
				</div>
				<div id='stats'>
					<ul>
						<li>
							<div id='nav-img-dash-admin'>
								<div id='child-nav-img'>
									<ul>
										<a href=""><li class='c-hover-back-lb'>Lihat Daftar</li></a>
										<a href="" class='c-hover-back-lb'><li>Sunting Daftar</li></a>
									</ul>
								</div>
							</div>
							<p class='c-color-dark'>Pemesanan yang belum terverifikasi</p>
							<p class='c-color-dark'>(80)</p>
						</li>
						<li>
							<div id='nav-img-dash-admin'>
								<div id='child-nav-img'>
									<ul>
										<a href=""><li class='c-hover-back-lb'>Lihat Daftar</li></a>
										<a href="" class='c-hover-back-lb'><li>Sunting Daftar</li></a>
									</ul>
								</div>
							</div>
							<p>Pengiriman uang pada penjual yang tertunda</p>
							<p  class='c-font-15' style='margin-top:65px;'>(80 | Rp. 3.500.000)</p>
						</li>
						<li class='c-back-pink'>
							<div id='nav-img-dash-admin'>
								<div id='child-nav-img'>
									<ul>
										<a href=""><li class='c-hover-back-lb'>Lihat Daftar</li></a>
										<a href="" class='c-hover-back-lb'><li>Sunting Daftar</li></a>
									</ul>
								</div>
							</div>
							<p>Pengajuan Verified seller yang terunda</p>
							<p>(80)</p>
						</li>
						<li class='c-back-dark-blue'>
							<div id='nav-img-dash-admin'>
								<div id='child-nav-img'>
									<ul>
										<a href=""><li class='c-hover-back-lb'><span class='c-hover-color-d'>Lihat Daftar</span></li></a>
										<a href="" class='c-hover-back-lb'><li><span class='c-hover-color-d'>Sunting Daftar</span></li></a>
									</ul>
								</div>
							</div>
							<p>Official Seller yang terdaftar</p>
							<p>(80)</p>
						</li>
						<div class='c-clean'></div>	
					</ul>
				</div>
			</div>
			<div class='c-clean'></div>
		</div>
	</body>
</html>