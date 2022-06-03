<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
        <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_submenu/aksi_submenu.php";
switch($_GET[act]){
  // Tampil Sub Menu
  default:
    echo "<header><h2>Sub Menu</h2></header><section class='container_6 clearfix'><section class='with-table'>
          <input type=button class='modalInput button button-blue' value='Tambah Sub Menu' onclick=\"window.location.href='?module=submenu&act=tambahsubmenu';\">
          <table class='datatable tablesort selectable paginate full'><thead>
          <tr><th>No</th>
          <th>Sub Menu</th>
          <th>Menu Utama</th>
          <th>Link Submenu</th>
          <th>Aktif</th>
          <th>aksi</th>
		  <th>aksi</th></tr></thead><tbody>";          

    $tampil = mysqli_query($konek, "SELECT * FROM submenu,mainmenu WHERE submenu.id_main=mainmenu.id_main");
  
    $no = 1;
    while($r=mysqli_fetch_array($tampil)){
	if($r[id_submain]!=0){
		$sub = mysqli_fetch_array(mysqli_query($konek,"SELECT * FROM submenu WHERE id_sub=$r[id_submain]"));
		$mainmenu = $r[nama_menu]." &gt; ".$sub[nama_sub];
	} else {
		$mainmenu = $r[nama_menu];
	}
      echo "<tr><td class='left' width='25'>$no</td>
                <td>$r[nama_sub]</td>
                <td>$mainmenu</td>
                <td>$r[link_sub]</td>
                <td class='center'>$r[aktif]</td>
		        <td><a href=?module=submenu&act=editsubmenu&id=$r[id_sub] class='button button-gray'><span class='pencil'></span>Edit</a></a></td>
				<td><a href=$aksi?module=submenu&act=hapus&id=$r[id_sub] class='button button-gray'></span>Hapus</a></td>		
		        </tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambahsubmenu":
  echo"<header><h2>Tambah Sub Menu</h2></header>
          <section class='clearfix'>
          <form class='form' method=POST action='$aksi?module=submenu&act=input'>
                                <div class='clearfix'>
                                    <label>Nama Sub Menu <em>*</em><small>Masukkan Nama Sub Menu</small></label><input type='text' name='nama_sub' required='required' />
                                </div>
                                <div class='clearfix'>
                                    <label>Link <small>Masukkan Link Menu</small></label><input type='text' name='link_sub'/>
                                </div>
								<div class='clearfix'>
                                <label>Aktif<small>Pilihan Menu Aktif Atau Tidak</small></label><select name='aktif'><option value='Y'/>Aktif<option value='N'/>Non Aktif</select>
                                </div>
                                <div class='clearfix'>
                                    <label>Menu Utama<small>Pilih Menu Utama</small></label><select name='menu_utama'><option value=0 selected>- Pilih Menu Utama -</option>";
									 $tampil=mysqli_query($konek,"SELECT * FROM mainmenu WHERE aktif='Y' ORDER BY nama_menu");
									 while($r=mysqli_fetch_array($tampil)){
									  echo "<option value=$r[id_main]>$r[nama_menu]</option>";
									}
									echo "</select>
                                </div>
                                <div class='action clearfix'>
                                    <button class='button button-gray' type='submit'><span class='accept'></span>Simpan</button>
                                    <button value=Batal onclick=self.history.back() class='button button-gray' type='reset'>Batal</button>
                                </div>
                            </form>
                        </section>";
    break;
    
  case "editsubmenu":
    $edit = mysqli_query($konek,"SELECT * FROM submenu WHERE id_sub='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
 echo "<header><h2>Edit Sub Menu</h2></header><section class='clearfix'>
       <form class='form' method=POST action=$aksi?module=submenu&act=update>
       <input type=hidden name=id value=$r[id_sub]>
	   <div class='clearfix'>
	   <label>Nama Sub Menu <em>*</em><small>Edit Nama Sub Menu</small></label><input type='text' name='nama_sub' value='$r[nama_sub]' required='required' />
       	  </div>
		  <div class='clearfix'>
            <label>Link Sub Menu <small>Masukkan Link Sub Menu</small></label><input type='text' name='link_sub' value='$r[link_sub]'/>
          </div>
		  <div class='clearfix'>
          	<label>Aktif<small>Pilihan Sub Menu Aktif Atau Tidak</small></label>";
			if ($r[aktif]=='Y'){
			echo"<select name='aktif'><option value='Y'/>Aktif<option value='N'/>Non Aktif</select>";
			}else{
			echo"<select name='aktif'><option value='N'/>Non Aktif<option value='Y'/>Aktif</select>";
			}
          echo"</div>
		  <div class='clearfix'>
          	<label>Menu Utama<small>Pilihan Menu Utama</small></label><select name='menu_utama'>"; 
          $tampil=mysqli_query($konek,"SELECT * FROM mainmenu WHERE aktif='Y' ORDER BY nama_menu");
          if ($r[id_main]==0){
            echo "<option value=0 selected>- Pilih Menu Utama -</option>";
          }   
          	while($w=mysqli_fetch_array($tampil)){
             if ($r[id_main]==$w[id_main]){
              echo "<option value=$w[id_main] selected>$w[nama_menu]</option>";
            }
            else{
              echo "<option value=$w[id_main]>$w[nama_menu]</option>";
            }
          }
    echo "</select>
			</div>
		  		<div class='action clearfix'>
                <button class='button button-gray' type='submit'><span class='accept'></span>Update</button>
                <button value=Batal onclick=self.history.back() class='button button-gray' type='reset'>Batal</button>
                </div>
         </div><br>";
	  break;  
}
}
?>
