<?php
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
/////// SISFO-PENAGIHAN v1.0                                    ///////
/////// Sistem Informasi Penagihan Client atas Produk Bulanan   ///////
///////////////////////////////////////////////////////////////////////
/////// Dibuat oleh :                                           ///////
/////// Agus Muhajir, S.Kom                                     ///////
/////// URL 	:                                               ///////
///////     * http://github.com/hajirodeon                      ///////
///////     * http://gitlab.com/hajirodeon                      ///////
/////// E-Mail	:                                               ///////
///////     * hajirodeon@yahoo.com                              ///////
///////     * hajirodeon@gmail.com                              ///////
/////// HP/SMS/WA : 081-829-88-54                               ///////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////


session_start();

//ambil nilai
require("../inc/config.php");
require("../inc/fungsi.php");
require("../inc/koneksi.php");
require("../inc/cek/adm.php");
require("../inc/class/paging.php");
$tpl = LoadTpl("../template/adm.html");


nocache;

//nilai
$filenya = "index.php";








//nilai
$judul = "DashBoard ADMIN WEB";
$judulku = $judul;




//postdate entri
$qyuk = mysqli_query($koneksi, "SELECT * FROM user_tagihan ".
									"ORDER BY postdate DESC");
$ryuk = mysqli_fetch_assoc($qyuk);
$yuk_entri_terakhir = balikin($ryuk['postdate']);






//postdate login
$qyuk = mysqli_query($koneksi, "SELECT * FROM user_log_login ".
									"ORDER BY postdate DESC");
$ryuk = mysqli_fetch_assoc($qyuk);
$yuk_login_terakhir = balikin($ryuk['postdate']);























//isi *START
ob_start();


echo '<div class="row">

  <div class="col-lg-12">
    <div class="info-box mb-3 bg-primary">
      <span class="info-box-icon"><i class="fa fa-user"></i></span>

      <div class="info-box-content">
        <span class="info-box-number">
        		'.$judul.'
			</span>

      </div>
    </div>

	</div>
</div>';




//isi
$judulku = ob_get_contents();
ob_end_clean();
              


























//isi *START
ob_start();

//tanggal sekarang
$m = date("m");
$de = date("d");
$y = date("Y");

//ambil 14hari terakhir
for($i=0; $i<=14; $i++)
	{
	$nilku = date('Ymd',mktime(0,0,0,$m,($de-$i),$y)); 

	echo "$nilku, ";
	}


//isi
$isi_data1 = ob_get_contents();
ob_end_clean();










//isi *START
ob_start();

//tanggal sekarang
$m = date("m");
$de = date("d");
$y = date("Y");

//ambil 14hari terakhir
for($i=0; $i<=14; $i++)
	{
	$nilku = date('Y-m-d',mktime(0,0,0,$m,($de-$i),$y)); 


	//pecah
	$ipecah = explode("-", $nilku);
	$itahun = trim($ipecah[0]);  
	$ibln = trim($ipecah[1]);
	$itgl = trim($ipecah[2]);    


	//ketahui ordernya...
	$qyuk = mysqli_query($koneksi, "SELECT * FROM user_log_login ".
							"WHERE round(DATE_FORMAT(postdate, '%d')) = '$itgl' ".
							"AND round(DATE_FORMAT(postdate, '%m')) = '$ibln' ".
							"AND round(DATE_FORMAT(postdate, '%Y')) = '$itahun'");
	$tyuk = mysqli_num_rows($qyuk);
									
									
	if (empty($tyuk))
		{
		$tyuk = "1";
		}
		
	echo "$tyuk, ";
	}


//isi
$isi_data2 = ob_get_contents();
ob_end_clean();









//isi *START
ob_start();

//tanggal sekarang
$m = date("m");
$de = date("d");
$y = date("Y");

//ambil 14hari terakhir
for($i=0; $i<=14; $i++)
	{
	$nilku = date('Y-m-d',mktime(0,0,0,$m,($de-$i),$y)); 


	//pecah
	$ipecah = explode("-", $nilku);
	$itahun = trim($ipecah[0]);  
	$ibln = trim($ipecah[1]);
	$itgl = trim($ipecah[2]);    


	//ketahui
	$qyuk = mysqli_query($koneksi, "SELECT * FROM user_tagihan ".
							"WHERE round(DATE_FORMAT(postdate, '%d')) = '$itgl' ".
							"AND round(DATE_FORMAT(postdate, '%m')) = '$ibln' ".
							"AND round(DATE_FORMAT(postdate, '%Y')) = '$itahun'");
	$tyuk = mysqli_num_rows($qyuk);
	
	if (empty($tyuk))
		{
		$tyuk = "1";
		}
		
	echo "$tyuk, ";
	}


//isi
$isi_data3 = ob_get_contents();
ob_end_clean();


















//isi *START
ob_start();


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jumlah 
$qx = mysqli_query($koneksi, "SELECT * FROM m_user");
$rowx = mysqli_fetch_assoc($qx);
$e_total_user = mysqli_num_rows($qx);



//jumlah 
$qx = mysqli_query($koneksi, "SELECT * FROM user_tagihan");
$rowx = mysqli_fetch_assoc($qx);
$e_total_tagihan = mysqli_num_rows($qx);



//jumlah 
$qx = mysqli_query($koneksi, "SELECT * FROM m_item");
$rowx = mysqli_fetch_assoc($qx);
$e_total_item = mysqli_num_rows($qx);
?>







		<!-- Info boxes -->
      <div class="row">

        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">USER PELANGGAN</span>
              <span class="info-box-number"><?php echo $e_total_user;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->



        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fa fa-briefcase"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ITEM PRODUK</span>
              <span class="info-box-number"><?php echo $e_total_item;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fa fa-newspaper-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TAGIHAN</span>
              <span class="info-box-number"><?php echo $e_total_tagihan;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->



        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">LOGIN TERAKHIR</span>
              <span class="info-box-number"><?php echo $yuk_login_terakhir;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        





        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="fa fa-calendar-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ENTRI TERAKHIR</span>
              <span class="info-box-number"><?php echo $yuk_entri_terakhir;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        
                
      </div>
      <!-- /.row -->







				<script>
					$(function () {
					  'use strict'
					
					  var ticksStyle = {
					    fontColor: '#495057',
					    fontStyle: 'bold'
					  }
					
					  var mode      = 'index'
					  var intersect = true
					
					
					  var $visitorsChart = $('#visitors-chart')
					  var visitorsChart  = new Chart($visitorsChart, {
					    data   : {
					      labels  : [<?php echo $isi_data1;?>],
					      datasets: [{
					        type                : 'line',
					        data                : [<?php echo $isi_data2;?>],
					        backgroundColor     : 'transparent',
					        borderColor         : 'blue',
					        pointBorderColor    : 'blue',
					        pointBackgroundColor: 'blue',
					        fill                : false
					        // pointHoverBackgroundColor: '#007bff',
					        // pointHoverBorderColor    : '#007bff'
					      },
					        {
					          type                : 'line',
					          data                : [<?php echo $isi_data3;?>],
					          backgroundColor     : 'tansparent',
					          borderColor         : 'orange',
					          pointBorderColor    : 'orange',
					          pointBackgroundColor: 'orange',
					          fill                : false
					          // pointHoverBackgroundColor: '#ced4da',
					          // pointHoverBorderColor    : '#ced4da'
					        }]
					    },
					    options: {
					      maintainAspectRatio: false,
					      tooltips           : {
					        mode     : mode,
					        intersect: intersect
					      },
					      hover              : {
					        mode     : mode,
					        intersect: intersect
					      },
					      legend             : {
					        display: false
					      },
					      scales             : {
					        yAxes: [{
					          // display: false,
					          gridLines: {
					            display      : true,
					            lineWidth    : '4px',
					            color        : 'rgba(0, 0, 0, .2)',
					            zeroLineColor: 'transparent'
					          },
					          ticks    : $.extend({
					            beginAtZero : true,
					            suggestedMax: 200
					          }, ticksStyle)
					        }],
					        xAxes: [{
					          display  : true,
					          gridLines: {
					            display: false
					          },
					          ticks    : ticksStyle
					        }]
					      }
					    }
					  })
					})
	
				</script>
	
	
	
	
	
	

		<!-- Info boxes -->
      <div class="row">
	
        <!-- /.col -->
        <div class="col-md-12">
	
	

	            <div class="card">
	              <div class="card-header border-transparent">
	                <h3 class="card-title">Grafik : Login, Entri</h3>
	
	                <div class="card-tools">
	                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
	                    <i class="fas fa-minus"></i>
	                  </button>
	                </div>
	              </div>
	              <div class="card-body">
	
	
	
	                <div class="position-relative mb-4">
	                  <canvas id="visitors-chart" height="200"></canvas>
	                </div>
	
	                <div class="d-flex flex-row justify-content-end">
	                  <span class="mr-2">
	                    <i class="fas fa-square text-blue"></i> Login
	                  </span>
	                  &nbsp;
	
	                  <span>
	                    <i class="fas fa-square text-orange"></i> Entri
	                  </span>
	                  

	                </div>
	
	
	                
	                
	              </div>
	            </div>
	
			</div>
			
		</div>
			            
	          

	





	
            
		<!-- Info boxes -->
      <div class="row">
	
        <!-- /.col -->
        <div class="col-md-6">
            
			<?php
			$limit = 100;
			$sqlcount = "SELECT * FROM user_tagihan ".
							"ORDER BY postdate DESC";

			//query
			$p = new Pager();
			$start = $p->findStart($limit);
			
			$sqlresult = $sqlcount;
			
			$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
			$pages = $p->findPages($count, $limit);
			$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
			$pagelist = $p->pageList($_GET['page'], $pages, $target);
			$data = mysqli_fetch_array($result);
			?>
			
			
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">TAGIHAN TERAKHIR</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <td align="center">POSTDATE</td>
                      <td align="center">USER</td>
                      <td align="center">TOTAL</td>
                    </tr>
                    </thead>
                    <tbody>
                    	
                    <?php
                    	do 
							{
							if ($warna_set ==0)
								{
								$warna = $warna01;
								$warna_set = 1;
								}
							else
								{
								$warna = $warna02;
								$warna_set = 0;
								}
					
							$nomer = $nomer + 1;
							$i_kd = nosql($data['kd']);
							$i_user_nama = balikin($data['user_nama']);
							$i_postdate = balikin($data['postdate']);
							$i_total = balikin($data['total']);

						
						

						
							echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
							echo '<td>'.$i_postdate.'</td>
							<td>'.$i_user_nama.'</td>
							<td align="right">'.xduit2($i_total).'</td>
					        </tr>';
							}
						while ($data = mysqli_fetch_assoc($result));
						?>
						
						
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->



		</div>
		
		

		        <!-- /.col -->
        <div class="col-md-6">



   
			<?php
			$limit = 50;
			$sqlcount = "SELECT * FROM m_item ".
							"ORDER BY nama ASC";

			//query
			$p = new Pager();
			$start = $p->findStart($limit);
			
			$sqlresult = $sqlcount;
			
			$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
			$pages = $p->findPages($count, $limit);
			$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
			$pagelist = $p->pageList($_GET['page'], $pages, $target);
			$data = mysqli_fetch_array($result);
			?>
			
			
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">ITEM PRODUK</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ITEM PRODUK</th>
                      <th>JUMLAH TAGIHAN</th>
                    </tr>
                    </thead>
                    <tbody>
                    	
                    <?php
                    	do 
							{
							if ($warna_set ==0)
								{
								$warna = $warna01;
								$warna_set = 1;
								}
							else
								{
								$warna = $warna02;
								$warna_set = 0;
								}
					
							$nomer = $nomer + 1;
							$i_kd = nosql($data['kd']);
							$i_nama = balikin($data['nama']);
							$i_nama2 = cegah($data['nama']);
							
						
						
							//jml
							$qku = mysqli_query($koneksi, "SELECT kd FROM user_tagihan ".
															"WHERE user_kd = '$i_kd'");
							$i_jml = mysqli_num_rows($qku);
						

						
							echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
							echo '<td>
							'.$i_nama.'
							</td>
							<td>'.$i_jml.'</td>
					        </tr>';
							}
						while ($data = mysqli_fetch_assoc($result));
						?>
						
						
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->







   
			<?php
			$limit = 50;
			$sqlcount = "SELECT * FROM m_user ".
							"ORDER BY round(jml_tagihan) DESC";

			//query
			$p = new Pager();
			$start = $p->findStart($limit);
			
			$sqlresult = $sqlcount;
			
			$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
			$pages = $p->findPages($count, $limit);
			$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
			$pagelist = $p->pageList($_GET['page'], $pages, $target);
			$data = mysqli_fetch_array($result);
			?>
			
			
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">PERINGKAT USER</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>NO</th>
                      <th>USER</th>
                      <th>JUMLAH TAGIHAN</th>
                    </tr>
                    </thead>
                    <tbody>
                    	
                    <?php
                    	do 
							{
							if ($warna_set ==0)
								{
								$warna = $warna01;
								$warna_set = 1;
								}
							else
								{
								$warna = $warna02;
								$warna_set = 0;
								}
					
							$i_no = $i_no + 1;
							$i_kd = nosql($data['kd']);
							$i_nama = nosql($data['nama']);
							$i_jml = nosql($data['jml_tagihan']);


						
							echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
							echo '<td>'.$i_no.'</td>
							<td>'.$i_nama.'</td>
							<td>'.$i_jml.'</td>
					        </tr>';
							}
						while ($data = mysqli_fetch_assoc($result));
						?>
						
						
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->



		</div>
		
		




		
		
		

		</div>
	</div>



            


		<!-- OPTIONAL SCRIPTS -->
		<script src="../template/adminlte3/plugins/chart.js/Chart.min.js"></script>
		




	
	<script language='javascript'>
	//membuat document jquery
	$(document).ready(function(){
	
	$.noConflict();

	});
	
	</script>
	






<?php
//kasi log entri ///////////////////////////////////////////////////////////////////////////////////
$ku_ket = cegah("[MENU : $judul].");			


//insert
mysqli_query($koneksi, "INSERT INTO user_log_entri(kd, ket, postdate) VALUES ".
				"('$x', '$ku_ket', '$today')");
//kasi log login ///////////////////////////////////////////////////////////////////////////////////


			
			
			
			
			
//isi
$isi = ob_get_contents();
ob_end_clean();

require("../inc/niltpl.php");

//diskonek
xfree($qbw);
xclose($koneksi);
exit();
?>