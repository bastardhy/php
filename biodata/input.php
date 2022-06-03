<h1 align="center">Input Biodata</h1>
<fieldset style="width: 50%; margin: auto;">
    <legend>Form Input Biodata</legend>
    
    <form action="simpan.php" method="post">
        <p>
            Nama Lengkap<br />
            <input type="text" name="nama" required />
        </p>
        
        <p>
            Jenis Kelamin<br />
            <input type="radio" name="jenis_kelamin" value="Laki-Laki" id="laki-laki" /><label for="laki-laki">Laki-Laki</label>
            <input type="radio" name="jenis_kelamin" value="Perempuan" id="perempuan" /><label for="perempuan">Perempuan</label>
        </p>
        
        <p>
            Alamat Lengkap<br />
            <textarea name="alamat" cols="50" required></textarea>
        </p>
        
        <p>
            Nomor Handphone<br />
            <input type="text" name="no_hp" required />
        </p>
        
        <p>
            <input type="submit" value="Simpan" />
            <input type="reset" value="Reset" onclick="return confirm('hapus data yang telah diinput?')">
        </p>
    </form>
</fieldset>
<br />
<center><a href="index.php">&Lt; Tabel Biodata</a></center>