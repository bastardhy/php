<?php
include "config/koneksi.php";
if ($_SESSION['leveluser']=='admin'){
echo "<ul> 
        <li class='fl action'><a href=?module=home class='button button-blue'>Home</a></li>";                         
                $main = mysqli_query($konek, "SELECT * FROM mainmenu WHERE aktif = 'Y'  AND levelmenu='A' order by id_main");    
                while($r = mysqli_fetch_array($main)) {
                    echo '<li class="fl action">';
                    if(empty($r[link])){
                        echo '<a class="has-popupballoon button button-blue"><span class="add"></span>'.$r[nama_menu].'</a>';
                    }else{
                        echo '<a href="'.$r[link].'" class="button button-blue help"><span class="accept"></span>'.$r[nama_menu].'</a>';
                    }
					$sub = mysqli_query($konek, "SELECT * FROM submenu, mainmenu WHERE submenu.id_main = mainmenu.id_main AND submenu.id_main = $r[id_main] AND submenu.aktif='Y'");
                    $jml = mysqli_num_rows($sub);
                    // apabila sub menu ditemukan
                    if($jml > 0) {
                       	echo '<ul>';
                       	while($w=mysqli_fetch_array($sub)){
                            echo '<li>';
								echo '<a href="'.$w[link_sub].'">'.$w[nama_sub].'</a>';
							echo '</li>';
                       	}           
                       	echo '</ul>';
						echo '</li>';
                    } else {
                        echo '</li>';
                    }
                }
echo "</ul>";

}
elseif ($_SESSION['leveluser']=='guru'){
echo "<ul> 
        <li class='fl action'><a href=?module=home class='button button-blue'>Home</a></li>";
                              
                $main = mysqli_query($konek,"SELECT * FROM mainmenu WHERE aktif = 'Y' AND levelmenu= 'G' order by id_main");
    
                while($r = mysqli_fetch_array($main)) {
                    echo '<li class="fl action">';
                    if(empty($r[link])){
                        echo '<a class="has-popupballoon button button-blue"><span class="add"></span>'.$r[nama_menu].'</a>';
                    }else{
                        echo '<a href="'.$r[link].'" class="button button-blue help"><span class="accept"></span>'.$r[nama_menu].'</a>';
                    }
						
                    
					$sub = mysqli_query($konek,"SELECT * FROM submenu, mainmenu WHERE submenu.id_main = mainmenu.id_main AND submenu.id_main = $r[id_main] AND submenu.aktif='Y'");
                    $jml = mysqli_num_rows($sub);
                    // apabila sub menu ditemukan
                    if($jml > 0) {
                       	echo '<ul>';
                       	while($w=mysqli_fetch_array($sub)){
                            echo '<li>';
								echo '<a href="'.$w[link_sub].'">'.$w[nama_sub].'</a>';
							echo '</li>';
                       	}           
                       	echo '</ul>';
						echo '</li>';
                    } else {
                        echo '</li>';
                    }
                }
echo "</ul>";

} 
elseif ($_SESSION['leveluser']=='siswa'){
echo "<ul> 
        <li class='fl action'><a href=?module=home class='button button-blue'>Home</a></li>";
                              
                $main = mysqli_query($konek,"SELECT * FROM mainmenu WHERE aktif = 'Y' AND levelmenu= 'S' order by id_main");
    
                while($r = mysqli_fetch_array($main)) {
                    echo '<li class="fl action">';
                    if(empty($r[link])){
                        echo '<a class="has-popupballoon button button-blue"><span class="add"></span>'.$r[nama_menu].'</a>';
                    }else{
                        echo '<a href="'.$r[link].'" class="button button-blue help"><span class="accept"></span>'.$r[nama_menu].'</a>';
                    }
						
                    
					$sub = mysqli_query($konek, "SELECT * FROM submenu, mainmenu 
          WHERE submenu.id_main = mainmenu.id_main AND submenu.id_main = $r[id_main] AND submenu.aktif='Y'");
                    $jml = mysqli_num_rows($sub);
                    // apabila sub menu ditemukan
                    if($jml > 0) {
                       	echo '<ul>';
                       	while($w=mysqli_fetch_array($sub)){
                            echo '<li>';
								echo '<a href="'.$w[link_sub].'">'.$w[nama_sub].'</a>';
							echo '</li>';
                       	}           
                       	echo '</ul>';
						echo '</li>';
                    } else {
                        echo '</li>';
                    }
                }
echo "</ul>";

} 
?>
