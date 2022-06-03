<?php
include 'connect.php';
?>
<style>
    tbody > tr:nth-child(2n+1) > td, tbody > tr:nth-child(2n+1) > th {
        background-color: #ededed;
    }
    table{
        width: 70%;
        margin: auto;
        border-collapse: collapse;
        box-shadow: darkgrey 3px;
    }
    thead tr {
        background-color: #36c2ff;
    }
</style>

<h1 align="center">Tabel Biodata</h1>

<center><a href="input.php">Input Biodata &Gt; </a></center>
<br />
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>Pilihan</th>
        </tr>
    </thead>
    
    <tbody>
    <?php
    $sql = "SELECT * FROM tabel_biodata ORDER BY id";
    $no  = 1;
    foreach ($dbh->query($sql) as $data) :
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nama'] ?></td>
            <td><?php echo $data['jenis_kelamin'] ?></td>
            <td><?php echo $data['alamat'] ?></td>
            <td><?php echo $data['no_hp'] ?></td>
            <td align="center">
                <a href="edit.php?id=<?php echo $data['id'] ?>"><img alt="edit" src="icon/edit.png" /></a>
                &nbsp;&nbsp;
                <a href="hapus.php?id=<?php echo $data['id'] ?>" onclick="return confirm('Anda yakin akan menghapus data?')"><img alt="hapus" src="icon/hapus.png" /></a>
            </td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>