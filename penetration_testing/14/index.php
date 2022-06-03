

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
    <HTML>
     <HEAD>
      <TITLE>Upload Foto</TITLE>
      <META NAME="Author" CONTENT="Bit Repository">
      <META NAME="Keywords" CONTENT="validate, extensions, file, javascript">
      <META NAME="Description" CONTENT="A JavaScript Extension Validator for Images">
    <SCRIPT LANGUAGE="JavaScript">
    <!--
    function validate()
    {
    var extensions = new Array("jpg","jpeg","gif","png","bmp");
    var image_file = document.form.image_file.value;
    var image_length = document.form.image_file.value.length;
    var pos = image_file.lastIndexOf('.') + 1;
    var ext = image_file.substring(pos, image_length);
    var final_ext = ext.toLowerCase();
    for (i = 0; i < extensions.length; i++)
    {
        if(extensions[i] == final_ext)
        {
        return true;
        }
    }
    alert(" Upload an image file with one of the following extensions: "+ extensions.join(', ') +".");
    return false;
    }
     //-->
     </SCRIPT>
     </HEAD>
     <?php 
    if(isset($_POST['submit']))
    {
    $current_image=$_FILES['image_file']['name'];
    $action = move_uploaded_file($_FILES['image_file']['tmp_name'], $current_image);
    if (!$action)
    {
    die('File Gagal diupload');
    }
    else
    {
    echo "File ".$current_image." Berhasil diupload";
    echo"<br>";
    echo "<a href='index.php'>Back</a>";
    }
     
    }
    else
    {
    ?>
    <BODY>
    <center>
    <form name="form" action="" enctype="multipart/form-data" method="post" onSubmit="return validate();">
    <h2>Upload Foto</h2>
    <br />
    	Upload foto anda : <INPUT type="file" name="image_file"> <input type="submit" name="submit" value="Submit">
    </form>
    </center>
    </BODY>
    <?php
    }
    ?>
    </HTML>

