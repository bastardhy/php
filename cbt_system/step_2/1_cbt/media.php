<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<html>
<head>


<title>..:: Computer Based Test ::.. </title>
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"/>
<link rel="stylesheet" media="screen" href="css/reset.css" />
<link rel="stylesheet" media="screen" href="css/grid.css" />
<link rel="stylesheet" media="screen" href="css/style.css" />
<link rel="stylesheet" media="screen" href="css/messages.css" />
<link rel="stylesheet" media="screen" href="css/forms.css" />
<link rel="stylesheet" media="screen" href="css/tables.css" />
<link rel="stylesheet" media="screen" href="css/standar.css" />

<script type="text/javascript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.ui.min.js"></script>
<script type="text/javascript" src="js/jquery.tables.js"></script>
<script type="text/javascript" src="js/jquery.flot.js"></script>
<script type="text/javascript" src="js/global.js"></script>

<script language="javascript" type="text/javascript"
src="tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
    <div id="wrapper">
        <header>
            <div class="clearfix">
      

                <div class="clear"></div>

                <a class="chevron fr">Expand/Collapse</a>
                <nav>
                <?php 
        include "menu.php"; ?>
                    <ul class="clearfix">
 <li class="fr action"><a href="#" class="button button-orange help">administrator</a>
                            <ul>
                        
                                <li><a href="media.php?module=user">Users</a></li>
                                <li><a href="logout.php">Sign out</a></li>
                            </ul>
                        </li>
                  </ul>
                </nav>
                 
            </div>
            
        </header>
        
          <section>
            <div class="container_8 clearfix">                

                <!-- Main Section -->

                <section class="main-section grid_8">
                        
                                
<?php include "content.php"; ?>
                <!-- Main Section End -->
            </div>
    </div>
    
    <footer>
        <div id="footer-inner" class="container_8 clearfix">
            <div class="grid_8">
               <a href='http://imagomedia.co.id'>Imago Media </a>| &copy; 2015. Computer Based Test (CBT)
            </div>
        </div>
    </footer>

    

</body>
</html>
<?php
}

?>