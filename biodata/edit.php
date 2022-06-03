<?php
include 'connect.php';
if (isset($_GET['id'])) {
    $query = $dbh->query("SELECT * FROM tabel_biodata WHERE id = '$_GET[id]'");
    $data  = $query->fetch(PDO::FETCH_ASSOC);
} else {
    echo "ID tidak tersedia!<br /><a href='index.php'>Kembali</a>";
    exit();
}

if ($data === false) {
    echo "Data tidak ditemukan!<br /><a href='index.php'>Kembali</a>";
    exit();
}
?>
<h1 align="center">Input Biodata</h1>
<fieldset style="width: 50%; margin: auto;">
    <legend>Form Input Biodata</legend>
    
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        <p>
            Nama Lengkap<br />
            <input type="text" name="nama" required value="<?php echo $data['nama']; ?>"/>
        </p>
        
        <p>
            Jenis Kelamin<br />
            <?php if ($data['jenis_kelamin'] === "Laki-Laki") : ?>
            <input type="radio" name="jenis_kelamin" value="Laki-Laki" id="laki-laki" checked /><label for="laki-laki">Laki-Laki</label>
            <input type="radio" name="jenis_kelamin" value="Perempuan" id="perempuan" /><label for="perempuan">Perempuan</label>
            <?php else : ?>
            <input type="radio" name="jenis_kelamin" value="Laki-Laki" id="laki-laki" /><label for="laki-laki">Laki-Laki</label>
            <input type="radio" name="jenis_kelamin" value="Perempuan" id="perempuan" checked /><label for="perempuan">Perempuan</label>
            <?php endif; ?>
        </p>
        
        <p>
            Alamat Lengkap<br />
            <textarea name="alamat" cols="50" required><?php echo $data['alamat']; ?></textarea>
        </p>
        
        <p>
            Nomor Handphone<br />
            <input type="text" name="no_hp" required value="<?php echo $data['no_hp']; ?>" />
        </p>
        
        <p>
            <input type="submit" value="Simpan" />
            <input type="reset" value="Reset" onclick="return confirm('hapus data yang telah diinput?')">
        </p>
    </form>
</fieldset>
<br />
<center><a href="index.php">&Lt; Tabel Biodata</a></center>
