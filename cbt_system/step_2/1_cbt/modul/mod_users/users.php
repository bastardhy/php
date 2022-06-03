<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysqli_query($konek,"SELECT * FROM users ORDER BY username");
      echo " <header><h2>Setting User Admin, Guru dan Siswa</h2></header><section class='container_6 clearfix'><section class='with-table'>
          <input type=button class='button button-blue' value='Tambah User' onclick=\"window.location.href='?module=user&act=tambahuser';\">";
    }
    else{
      $tampil=mysqli_query($konek,"SELECT * FROM users WHERE username='$_SESSION[namauser]'");
      echo "<header><h2>User</h2></header><section class='container_6 clearfix'><section class='with-table'>";
    }
    
    echo "<table class='list'><thead>
          <tr>
          <th>no</th>
          <th>username</th>
          <th>nama lengkap</th>
          <th>email</th>
          <th>Jabatan</th>          
          <th>aksi</th>
          </tr></thead> "; 
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[username]</td>
             <td>$r[nama_lengkap]</td>
		         <td><a href=mailto:$r[email]>$r[email]</a></td>
		         <td class='center'>$r[jabatan]</td>		         
             <td class='center' width='150'><a href='?module=user&act=edituser&id=$r[id_user]' class='button button-gray'><span class='pencil'></span>Edit</a></td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  case "tambahuser":
    if ($_SESSION[leveluser]=='admin'){
    echo "<header><h2>Tambah User Untuk Penguji dan Peserta Tes</h2></header><section class='container_6 clearfix'>
          <form method=POST action='$aksi?module=user&act=input'>
          <table class='forms'>
          <tr><td>Username</td>     <td> : <input type=text name='username'></td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'></td></tr>
          <tr><td>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30></td></tr>  
          <tr><td>E-mail</td>       <td> : <input type=text name='email' size=30></td></tr>
           <tr><td class='left'>Jabatan</td>   <td> : <input type=text name='jabatan' size=30 value='$r[jabatan]'></td></tr>
		    <tr><td class='left'>Level</td>   <td> : <select name='level'><option value='siswa'/>Siswa<option value='guru'/>Guru</select>
			
          <tr><td colspan=2><button class='button button-blue'><span class='disk'></span>Simpan</button>
                            <input type=button class='button button-red' value=Batal onclick=self.history.back()></button></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "edituser":
    $edit=mysqli_query($konek,"SELECT * FROM users WHERE id_user='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin'){
    echo "<header><h2>Edit User</h2></header><section class='container_6 clearfix'>
          <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_user]'>
         <table class='forms'>
          <tr><td class='left'>Username</td>     <td> : <input type=text name='username' value='$r[username]' disabled> **)</td></tr>
          <tr><td class='left'>Password</td>     <td> : <input type=text name='password'> *) </td></tr>
          <tr><td class='left'>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>
          <tr><td class='left'>E-mail</td>       <td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
           <tr><td class='left'>Jabatan</td>   <td> : <input type=text name='jabatan' size=30 value='$r[jabatan]'></td></tr>
		    <tr><td class='left'>Level</td>   <td> : ";
			if ($r[level]=='admin'){
			echo"<select name='level'><option value='admin'/>Admin<option value='guru'/>Guru<option value='siswa'/>Siswa</select>";
			}
			elseif ($r[level]=='guru'){
			echo"<select name='level'><option value='guru'/>Guru<option value='admin'/>Admin<option value='siswa'/>Siswa</select>";
			}
			else{
			echo"<select name='level'><option value='siswa'/>Siswa<option value='admin'/>Admin<option value='guru'/>Guru</select>";
			}
          echo"</select>	
		   <tr><td class='left' colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.</td></tr>
          <tr><td class='left' colspan=2><button class='button button-blue'><span class='disk'></span>Simpan</button>
                            <input type=button class='button button-red' value=Batal onclick=self.history.back()></button></td></tr>
          </table></form>";     
    }
    else{
    echo "<header><h2>Edit User</h2></header><section class='container_6 clearfix'>
          <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_user]'>
		  <input type=hidden name=jabatan value='$r[jabatan]'>
		  <input type=hidden name=level value='$r[level]'>
          <table class='forms'>
          <tr><td class='left'>Username</td>     <td> : <input type=text name='username' value='$r[username]' disabled> **)</td></tr>
          <tr><td class='left'>Password</td>     <td> : <input type=text name='password'> *) </td></tr>
          <tr><td class='left'>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>
          <tr><td class='left'>E-mail</td>       <td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>";    
    echo "<tr><td class='left' colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.</td></tr>
          <tr><td class='left' colspan=2><button class='button button-blue'><span class='disk'></span>Update</button>
                            <input type=button class='button button-red' value=Batal onclick=self.history.back()></button></td></tr>
          </table></form>";     
    }
    break;  
}
}
?>
