<?php

$fp = fopen("iplog", "a+"); 
$date= time(); 
fputs($fp, $_SERVER['HTTP_USER_AGENT'].' - <br>Date/Time: '.$date.' '.$_SERVER['REMOTE_ADDR']."--------------------------------Next Person<p><br>\r\n");
fclose($fp);
?>
<a href="log_view.php" target=_blank><h2>Tampilkan Log</h2></a>
