<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_menuutama/aksi_menuutama.php";
switch($_GET[act]){
  // Tampil Menu Utama Khusus Untuk Level User Admin.
  default:
  if ($_SESSION[leveluser]=='admin'){
  echo " <header><h2>Menu Utama</h2></header><section class='container_6 clearfix'><section class='with-table'>
          <input type=button class='modalInput button button-blue' value='Tambah Menu Utama' onclick=\"window.location.href='?module=menuutama&act=tambahmenuutama';\"></p>
          <table class='datatable tablesort selectable paginate full'><thead>
          <tr><th>no</th>
          <th>menu utama</th>
          <th>link</th>
         <th>aktif</th>
         <th>Level menu</th>
         <th>Aksi</th>
		 <th>Aksi</th></tr></thead><tbody>";
          
    $tampil=mysqli_query($konek, "SELECT * FROM mainmenu");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td class='center'>$r[nama_menu]</td>
             <td class='center'>$r[link]</td>
             <td class='center'>$r[aktif]</td>
             <td class='center'>$r[levelmenu]</td>
			 <td ><a href='?module=menuutama&act=editmenuutama&id=$r[id_main]' class='button button-gray'><span class='pencil'></span>Edit</a> </td>			 			<td > <a href='$aksi?module=menuutama&act=hapus&id=$r[id_main]' class='button button-gray'></span>Hapus</a></td></tr>";
      $no++;
    }
    echo "</tbody></table>";
 
    }
    else{
	//Jika Level User Bukan Admin Tampilkan Halaman Ini
      echo "<header><h2>Anda Tidak Berhak Mengakses Halaman Ini !</h2></header>";
    }
    
	break;
  
  // Form Tambah Menu Utama
  case "tambahmenuutama":
  echo"<header><h2>Tambah Menu Utama</h2></header>
          <section class='clearfix'>
          <form class='form' method=POST action='$aksi?module=menuutama&act=input'>
                                <div class='clearfix'>
                                    <label>Nama Menu <em>*</em><small>Masukkan Nama Menu</small></label><input type='text' name='nama_menu' required='required' />
                                </div>
                                <div class='clearfix'>
                                    <label>Link <small>Masukkan Link Menu</small></label><input type='text' name='link'/>
                                </div>
								<div class='clearfix'>
                                <label>Aktif<small>Pilihan Menu Aktif Atau Tidak</small></label><select name='aktif'><option value='Y'/>Aktif<option value='N'/>Non Aktif</select>
                                </div>
                                <div class='clearfix'>
                                    <label>Level Menu<small>Pilih Level Menu</small></label><select name='levelmenu'>
									<option value='A'>Admin
									<option value='G'>Guru
									<option value='S'> Siswa</select>
                                </div>
                                <div class='action clearfix'>
                                    <button class='button button-gray' type='submit'><span class='accept'></span>Simpan</button>
                                    <button value=Batal onclick=self.history.back() class='button button-gray' type='reset'>Batal</button>
                                </div>
                            </form>
                        </section>";
     break;
  
  // Form Edit Menu Utama
  case "editmenuutama":
    $edit=mysqli_query($konek,"SELECT * FROM mainmenu WHERE id_main='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo "<header><h2>Edit Menu Utama</h2></header><section class='clearfix'>
          <form class='form' method=POST action=$aksi?module=menuutama&act=update>
          <input type=hidden name=id value='$r[id_main]'>
		  <div class='clearfix'>
		  	<label>Nama Menu <em>*</em><small>Edit Nama Menu</small></label><input type='text' name='nama_menu' value='$r[nama_menu]' required='required' />
          </div>
		  <div class='clearfix'>
            <label>Link <small>Masukkan Link Menu</small></label><input type='text' name='link' value='$r[link]'/>
          </div>
		  <div class='clearfix'>
          	<label>Aktif<small>Pilihan Menu Aktif Atau Tidak</small></label>";
			if ($r[aktif]=='Y'){
			echo"<select name='aktif'><option value='Y'/>Aktif<option value='N'/>Non Aktif</select>";
			}else{
			echo"<select name='aktif'><option value='N'/>Non Aktif<option value='Y'/>Aktif</select>";
			}
          echo"</div>
		  <div class='clearfix'>
          	<label>Level Menu<small>Pilihan Level Menu</small></label>";
			if ($r[levelmenu]=='A'){
			echo"<select name='levelmenu'><option value='A'/>Admin<option value='G'/>Guru<option value='S'/>Siswa</select>";
			}
			elseif ($r[levelmenu]=='G'){
			echo"<select name='levelmenu'><option value='G'/>Guru<option value='A'/>Admin<option value='S'/>Siswa</select>";
			}
			else{
			echo"<select name='levelmenu'><option value='S'/>Siswa<option value='A'/>Admin<option value='G'/>Guru</select>";
			}
          echo"</div>
		  		<div class='action clearfix'>
                <button class='button button-gray' type='submit'><span class='accept'></span>Update</button>
                <button value=Batal onclick=self.history.back() class='button button-gray' type='reset'>Batal</button>
                </div>
         </div><br>";
    break;  
}
}
?>
