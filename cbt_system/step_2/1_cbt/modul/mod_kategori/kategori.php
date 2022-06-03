<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_kategori/aksi_kategori.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
    echo "<header><h2>Kategori</h2></header><section class='container_6 clearfix'><section class='with-table'>
          <input type=button class='modalInput button button-blue' value='Tambah Kategori' 
          onclick=\"window.location.href='?module=kategori&act=tambahkategori';\">
          <table class='datatable tablesort selectable paginate full'><thead>
          <tr><th>No</th>
		  <th>nama kategori</th>
		  <th>Nama User Hak Akses</th>
		  <th>aksi</th></tr>"; 
    $tampil=mysqli_query($konek, "SELECT * FROM kategori,users WHERE kategori.id_user = users.id_user ORDER BY kategori.id_kategori DESC");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_kategori]</td>
			 <td>$r[nama_lengkap]</td>
             <td><a href='?module=kategori&act=editkategori&id=$r[id_kategori]' class='button button-gray'><span class='pencil'></span>Edit</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    echo "<div id=paging>*) Data pada Kategori tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Kategori.</div><br>";
    break;
  
  // Form Tambah Kategori
  case "tambahkategori":
    echo "<header><h2>Tambah Kategori</h2></header>
          <section class='clearfix'>
		  <form method=POST class='form' action='$aksi?module=kategori&act=input'>
          <div class='clearfix'>
              <label>Nama Kategori <em>*</em><small>Masukkan Nama Kategori Test</small></label><input type='text' name='nama_kategori' required='required' />
          </div>
		    <div class='clearfix'>
          	<label>Username<em>*</em><small>Siapa Yang Berhak Akses Kategori</small></label><select name='username'>"; 
          $tampil=mysqli_query($konek,"SELECT * FROM users WHERE level ='guru' ORDER BY username");
          if ($r[username]==0){
            echo "<option value=0 selected>- Pilih Username -</option>";
          }   
          	while($w=mysqli_fetch_array($tampil)){
             if ($r[username]==$w[username]){
              echo "<option value=$w[username] selected>$w[nama_lengkap]</option>";
            }
            else{
              echo "<option value=$w[username]>$w[nama_lengkap]</option>";
            }
          }
    echo "</select>	
          <div class='action clearfix'>
          	<button class='button button-gray' type='submit'><span class='accept'></span>Simpan</button>
            <button value=Batal onclick=self.history.back() class='button button-gray' type='reset'>Batal</button>
          </div></form>
          </section>";
     break;
  
  // Form Edit Kategori  
  case "editkategori":
    $edit=mysqli_query($konek,"SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
	 echo "<header><h2>Tambah Kategori</h2></header>
          <section class='clearfix'>
		  <form method=POST class='form' action='$aksi?module=kategori&act=update'>
		  <input type=hidden name=id value='$r[id_kategori]'>
          <div class='clearfix'>
           <label>Nama Kategori <em>*</em><small>Masukkan Nama Kategori Test</small></label><input type='text' name='nama_kategori' value='$r[nama_kategori]' required='required' />
          </div><div class='clearfix'>
          	<label>Username<em>*</em><small>Siapa Yang Berhak Akses Kategori</small></label><select name='id_user'>"; 
          $tampil=mysqli_query($konek,"SELECT * FROM users WHERE level ='guru' ORDER BY username");
          if ($r[username]==0){
            echo "<option value=0 selected>- Pilih Username -</option>";
          }   
          	while($w=mysqli_fetch_array($tampil)){
             if ($r[id_user]==$w[id_user]){
              echo "<option value=$w[id_user] selected>$w[nama_lengkap]</option>";
            }
            else{
              echo "<option value=$w[id_user]>$w[nama_lengkap]</option>";
            }
          }
    echo "</select>	  
          <div class='action clearfix'>
          	<button class='button button-gray' type='submit'><span class='accept'></span>Simpan</button>
            <button value=Batal onclick=self.history.back() class='button button-gray' type='reset'>Batal</button>
          </div></form>
          </section>";

    break;  
}
}
?>
