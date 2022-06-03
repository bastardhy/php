<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_pertanyaan/aksi_pertanyaan.php";
switch($_GET[act]){
  // Tampil Pertanyaan Khusus Untuk Level User Admin.
  default:
  if ($_SESSION[leveluser]=='guru'){
  echo " <header><h2>Pertanyaan Untuk <b>$_SESSION[jabatan] </b></h2></header><section class='container_6 clearfix'>
          <input type=button class='modalInput button button-blue' value='Tambah Soal' onclick=\"window.location.href='?module=pertanyaan&act=tambahpertanyaan';\">
		  <ul class='action-buttons clearfix fr'><li>
           <input type=button class='modalInput button button-orange' value='Import Soal' onclick=\"window.location.href='?module=pertanyaan&act=importpertanyaan';\">
           </li>
           </ul></p>
          <table class='list'><thead>
          <tr><th >No</th>
          <th width='205'>Pertanyaan</th>
          <th>Jawaban A</th>
          <th>Jawaban B</th>
          <th>Jawaban C</th>
		  <th>Jawaban D</th>
		  <th>Jawaban Benar</th>
          <th width = 150>Aksi</th></tr></thead><tbody>";
      //Membuat Btasan Tampilan Per Halaman
  	$batas   = 10; //Batasan Berapa Record Yang Akan Ditampilkan Per Halaman
	$halaman = $_GET['halaman'];
	if(empty($halaman)){
		$posisi=0;
		$halaman=1;
	}
	else{
	$posisi = ($halaman-1) * $batas;
	}
	$user = $_SESSION[kategori];
	$kategori=mysqli_query($konek, "SELECT * FROM kategori WHERE id_user = $user");
	$k    = mysqli_fetch_array($kategori);
	$id_kategori = $k[id_kategori];
	//Ambil Data Dari Data Soal      
    $tampil=mysqli_query($konek,"SELECT * FROM tabel_soal WHERE id_kategori = $id_kategori ORDER BY id_soal ASC LIMIT $posisi, $batas");
    $no=$posisi+1;
    while ($r=mysqli_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[pertanyaan]</td>
             <td>$r[pilihan_a]</td>
             <td>$r[pilihan_b]</td>
             <td>$r[pilihan_c]</td>
			 <td>$r[pilihan_d]</td>
			 <td>$r[jawaban_benar]</td>
			 <td><a href='?module=pertanyaan&act=editpertanyaan&id=$r[id_soal]' class='button button-gray'><span class='pencil'></span>Edit</a> | 
			 <a href='$aksi?module=pertanyaan&act=hapus&id=$r[id_soal]' class='button button-gray'></span>Hapus</a></td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
 //Hitung total data dan halaman serta link 1,2,3 ...
		echo "<br>Halaman : ";
		$tampil2="select * from tabel_soal WHERE id_kategori = $id_kategori";
		$hasil2=mysqli_query($tampil2);
		$jmldata=mysqli_num_rows($hasil2);
		$jmlhalaman=ceil($jmldata/$batas);		
		for($i=1;$i<=$jmlhalaman;$i++)
		if ($i != $halaman)
		{
		echo " <a href=$_SERVER[PHP_SELF]?module=pertanyaan&halaman=$i>$i</a> | ";
		}
		else
		{
		echo " <b>$i</b> | ";
		}

    }
    else{
	//Jika Level User Bukan Admin Tampilkan Halaman Ini
      echo "<header><h2>Anda Tidak Berhak Mengakses Halaman Ini !</h2></header>";
    }
    
	break;
  
  // Form Tambah Pertanyaan
  case "tambahpertanyaan":
  	$user = $_SESSION[kategori];
	$kategori=mysqli_query($konek,"SELECT * FROM kategori WHERE id_user = $user");
	$k    = mysqli_fetch_array($kategori);
	$id_kategori = $k[id_kategori];
	echo "<header><h2>Tambah Pertanyaan</h2></header><section class='clearfix'>
          <form class='form' method=POST action=$aksi?module=pertanyaan&act=input>
		  <input type=hidden name=id_kategori value='$id_kategori'>
          <div class='clearfix'>
		  	<label>Pertanyaan <em>*</em><small>Edit Pertanyaan</small></label><textarea name='pertanyaan' style='width: 600px;'></textarea>
          </div>
		  <div class='clearfix'>
            <label>Pilihan A <small>Masukkan Pilihan Jawaban A</small></label><input type='text' name='pilihan_a'/>
          </div>
		  <div class='clearfix'>
            <label>Pilihan B <small>Masukkan Pilihan Jawaban B</small></label><input type='text' name='pilihan_b' />
          </div>
		  <div class='clearfix'>
            <label>Pilihan C <small>Masukkan Pilihan Jawaban C</small></label><input type='text' name='pilihan_c'/>
          </div>
		  <div class='clearfix'>
            <label>Pilihan D <small>Masukkan Pilihan Jawaban D</small></label><input type='text' name='pilihan_d'/>
          </div>
		  <div class='clearfix'>
            <label>Jawaban Benar <small>Masukkan Jawaban Benarnya</small></label><select name='jawaban_benar'>";
		  
		  echo"<option value=0 selected>- Pilih Jawaban -</option>
		        <option value=A> A </option>
				<option value=B> B </option>
				<option value=C> C </option>
				<option value=D> D </option>";
	
		  echo"</select>
          </div>
		 
		  		<div class='action clearfix'>
                <button class='button button-gray' type='submit'><span class='accept'></span>Simpan</button>
                <button value=Batal onclick=self.history.back() class='button button-gray' type='reset'>Batal</button>
                </div>
         </div><br>";
     break;
  
  // Form Edit Pertanyaan
  case "editpertanyaan":
    $edit=mysqli_query($konek,"SELECT * FROM tabel_soal WHERE id_soal='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
	
	$user = $_SESSION['kategori'];
	$kategori=mysqli_query($konek,"SELECT * FROM kategori WHERE id_user = $user");
	$k    = mysqli_fetch_array($kategori);
	$id_kategori = $k['id_kategori'];

    echo "<header><h2>Edit Pertanyaan</h2></header><section class='clearfix'>
          <form class='form' method=POST action=$aksi?module=pertanyaan&act=update>
          <input type=hidden name=id value='$r[id_soal]'>
		  <input type=hidden name=id_kategori value='$id_kategori'>
		  <div class='clearfix'>
		  	<label>Pertanyaan <em>*</em><small>Edit Pertanyaan</small></label><textarea name='pertanyaan' style='width: 600px; height: 50px;'>$r[pertanyaan]</textarea>
          </div>
		  <div class='clearfix'>
            <label>Pilihan A <small>Masukkan Pilihan Jawaban A</small></label><input type='text' name='pilihan_a' value='$r[pilihan_a]'/>
          </div>
		  <div class='clearfix'>
            <label>Pilihan B <small>Masukkan Pilihan Jawaban B</small></label><input type='text' name='pilihan_b' value='$r[pilihan_b]'/>
          </div>
		  <div class='clearfix'>
            <label>Pilihan C <small>Masukkan Pilihan Jawaban C</small></label><input type='text' name='pilihan_c' value='$r[pilihan_c]'/>
          </div>
		  <div class='clearfix'>
            <label>Pilihan D <small>Masukkan Pilihan Jawaban D</small></label><input type='text' name='pilihan_d' value='$r[pilihan_d]'/>
          </div>
		  <div class='clearfix'>
            <label>Jawaban Benar <small>Masukkan Jawaban Benarnya</small></label><select name='jawaban_benar'>";
		  if ($r['jawaban_benar']==''){
		  echo"<option value=0 selected>- Pilih Jawaban -</option>
		        <option value=A> A </option>
				<option value=B> B </option>
				<option value=C> C </option>
				<option value=D> D </option>";
		  }
          else{
          echo "<option value=$r[jawaban_benar]>$r[jawaban_benar]</option>
		  		<option value=A> A </option>
				<option value=B> B </option>
				<option value=C> C </option>
				<option value=D> D </option>";
          }
		  echo"
		  </select>
          </div>
		 
		  		<div class='action clearfix'>
                <button class='button button-gray' type='submit'><span class='accept'></span>Update</button>
                <button value=Batal onclick=self.history.back() class='button button-gray' type='reset'>Batal</button>
                </div>
         </div><br>";
    break;  
	
	 // Form Tambah Pertanyaan
  case "importpertanyaan":
  	$user = $_SESSION[kategori];
	$kategori=mysqli_query($konek,"SELECT * FROM kategori WHERE id_user = $user");
	$k    = mysqli_fetch_array($kategori);
	$id_kategori = $k[id_kategori];
	echo "<header><h2>Import Pertanyaan Dari Data Eksternal</h2></header><section class='clearfix'>
	<form class='form' method='post' enctype='multipart/form-data' action='$aksi?module=pertanyaan&act=import'>
	<input type=hidden name=id_kategori value='$id_kategori'>
    <div class='clearfix'>
          <label>Buka Data<small>MS. Excell format</small></label><input name='userfile' type='file' />
          </div>
	 <div class='action clearfix'>
                <button class='button button-gray' type='submit' name='upload'><span class='accept'></span>Import</button>
                <button value=Batal onclick=self.history.back() class='button button-gray' type='reset'>Batal</button>
                </div>
         </div>	  
    </form>
	  
         ";
     break;
}
}
?>
