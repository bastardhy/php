<?php 
session_start();
if (isset($_POST['comment'])) {
    $_SESSION['notif'] = 'comment succes inserted';
   
}
?>
<!doctype html>
<html>
    <head>
        <title>Useradd - harviacode.com</title>
        <style>
            .notif{
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
    
        <h2>Tambah User</h2>
        <form action="useradd.php" method="post">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input required /></td>
                </tr>
                <tr>
                    <td>NRP</td>
                    <td><input required /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="comment" value="Tambah" /></td>
                </tr>
            </table>
        </form>
        <?php 
            if (isset($_SESSION['notif']) && $_SESSION['notif'] <> '') {
                echo '<div class="notif">'.$_SESSION['notif'].'</div>';
            }
            $_SESSION['notif'] = '';
            ?>
         <script src="../javascript/jquery.min.js"></script>
        <script>
            $(document).ready(function(){setTimeout(function(){$(".notif").fadeIn('slow');}, 500);});
            setTimeout(function(){$(".notif").fadeOut('slow');}, 5000);
        </script>
    </body>
</html>
