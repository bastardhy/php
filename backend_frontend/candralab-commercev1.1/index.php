<?		// Include MySQL class
	session_start();
	include('backsite/inc/config.php');
					require_once ('inc/mysql.class.php');
					// Include database connection
					require_once ('inc/global.inc.php');
					// Include functions
					require_once ('inc/functions.inc.php');
					// Start the session
				?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modern Book Store </title>

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />

</head>
<body>

<div id="templatemo_wrapper_outer">
	<div id="templatemo_wrapper">
    
    	<div id="templatemo_header">
			<div id="site_title">
				<h1><a href="http://www.templatemo.com"> BOOKStore<span>Cepat, Murah, Lengkap</span></a></h1>
			</div> <!-- end of site_title -->

				<ul id="social_box">
					<li><a href="http://www.facebook.com/templatemo"><img src="images/facebook.png" alt="facebook" /></a></li>
					<li><a href="#"><img src="images/twitter.png" alt="twitter" /></a></li>
					         
				</ul>
			
			<div class="cleaner"></div>
		</div>
        
        <div id="templatemo_menu">
           <ul  >
						<li>
							<a href="index.php?page=home">Home</a>
						</li>
						<li>
							<a href="index.php?page=cart"> keranjang </a>
						</li>
					<li>
							<a href="index.php?page=cara_pesan">Cara pesan</a>
						</li>
						<li>
							<a href="index.php?page=profil">profil</a>
						</li>
						<li>
							<a href="index.php?page=bayar_form_add"> Pembayaran</a>
						</li>
							
					</ul>	
        </div> <!-- end of templatemo_menu -->
        
        <div id="templatemo_slider_wrapper">
        
        	<div id="templatemo_slider">
            
				<div id="one" class="contentslider">
                    <div class="cs_wrapper">
                        <div class="cs_slider">
                        <?php
                        $sql="select * from buku order by rand() limit 3";
                        $hasil=mysql_query($sql) or die(mysql_error());

while($get_data=mysql_fetch_array($hasil)){
	


                        ?>
                      
                            <div class="cs_article">
                            	<div class="slider_content_wrapper">
									
									<div class="slider_image">
										<img src="cover/<?=$get_data['cover']?>" width='150px' heigth='150px'>
									</div>
									
									<div class="slider_content">
                                        <h2><?=$get_data['judul']
?></h2>	<?=$get_data['deskripsi'];?>
                                   
										<div class="btn_more"><a href="index.php?page=cart&action=add&id=<?=$get_data['kd_buku']?>">Add to cart</a></div>
									</div>
                                
								</div>
                            </div><!-- End cs_article -->
                            
   <?
}//end while
?>
                            
            
                      
                        </div><!-- End cs_slider -->
                    </div><!-- End cs_wrapper -->
                </div><!-- End contentslider -->
                
                <!-- Site JavaScript -->
                <script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
                <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
                <script type="text/javascript" src="js/jquery.ennui.contentslider.js"></script>
                <script type="text/javascript">
                    $(function() {
                    $('#one').ContentSlider({
                    width : '940px',
                    height : '240px',
                    speed : 400,
                    easing : 'easeOutSine'
                    });
                    });
                </script>
                <script src="js/jquery.chili-2.2.js" type="text/javascript"></script>
                <script src="js/chili/recipes.js" type="text/javascript"></script>
                <div class="cleaner"></div>
            	
            </div>
        
        </div>
        
        <div id="templatemo_content_wrapper">
			<div id="content">
            	
                <h2>Mengapa Membeli buku di sini adalah pilihan tepat</h2>
                
                <div class="reasons">
                	<h3>Murah</h3>
                    <img src="images/reason1.png" alt="Reason1" />
                    <p>Buku yang anda dapat mempunyai harga dibawah rata rata toko </p>
                </div>
                
                <div class="reasons">
                	<h3>Cepat</h3>
                    <img src="images/reason2.png" alt="Reason2" />
                    <p>Pemesanan cepat dan mudah </p>
                </div>
                
                <div class="reasons">
                	<h3>100% Satisfaction</h3>
                    <img src="images/reason3.png" alt="Reason3" />
                    <p> Anda tidak puas, uang kembali </p>
                </div>
                
                <div class="hr_divider"></div>
                
                <div class="col_w560">
                		<?php
/* kode untuk meload halaman yang berbeda*/
if(isset($_GET['page'])) {
	$page = $_GET['page'] . ".php";
	include ($page);

} else {
	include ('detail.php');
}?>
                	
                </div>
                
                <div class="col_w280">
                	<h3>Kategori</h3>
            		<?php
            		include('kategori.php');
					?>
                  <h2>Alamat kami</h2>
						<p>
							Jl Lurus no 5 Yogyakarta
							<br>
							Telp (0274) 123456
							<br>
							Email:bukumurah@gmail.com
						</p>
                </div>
                
                <div class="cleaner"></div>
                
            </div>
			
            <div class="cleaner"></div>        
        
		</div>
		
		<div id="templatemo_content_wrapper_bottm"></div>
   
		<div id="templatemo_footer">
		
             Copyright © 2012 <a href="#">Candralab</a>  
			 
       </div>
        
	</div> <!-- end of wrapper -->
</div> <!-- end of wrapper_outer -->

</body>
</html>