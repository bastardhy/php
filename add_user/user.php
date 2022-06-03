<?php 
session_start();
?>
<!doctype html>
<html>
    <head>
        <title>User - harviacode.com</title>
        <style>
            .pesan{
                display: none;
                position: fixed;
                border: 1px solid black;
                width: 200px;
                top: 10px;
                left: 200px;
                padding: 5px 10px;
                background-color: goldenrod;;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div style="width: 600px">
            <?php 
    //        menampilkan pesan jika ada pesan
            if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                echo '<div class="pesan">'.$_SESSION['pesan'].'</div>';
            }

    //        mengatur session pesan menjadi kosong
            $_SESSION['pesan'] = '';
            ?>
            <h2>Tabel User</h2>
            <a href="useradd.php">Tambah</a>
            <table border="1" width="100%">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NRP</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Budi</td>
                    <td>09999</td>
                    <td>
                        <a href="#">Edit</a> |
                        <a href="#">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Chandra</td>
                    <td>09998</td>
                    <td>
                        <a href="#">Edit</a> |
                        <a href="#">Delete</a>
                    </td>
                </tr>
            </table>
            1 | 2 | 3
        </div>
        <script src="../javascript/jquery.min.js"></script>
        <script>
//            angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
            $(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
//            angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
            setTimeout(function(){$(".pesan").fadeOut('slow');}, 3000);
        </script>
    </body>
</html>
