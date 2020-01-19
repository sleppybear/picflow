<form method="POST" enctype="multipart/form-data">
    <input type="file" name="myimage">
    <input type="submit" name="upload" value="Upload">
</form>
<?php
use db\DbConnection;
require_once "requirements.php";

if(isset($_POST['upload'])){
    if(isset($_FILES['myimage'])){
        $con = DbConnection::Instance();
        $upload_image=$_FILES["myimage"]["name"];
        $folder="/images/";
        $success=move_uploaded_file($_FILES["myimage"]["tmp_name"], __DIR__."$folder".$_FILES["myimage"]["name"]);
        if($success){
            echo "Success!";
        }
        else echo "Fail upload";
        $con->query("INSERT INTO `images` (`path`, `name`) VALUES('$folder', '$upload_image')");
        $con->close();
    }
    else echo "<strong>Choose file</strong>";
}
