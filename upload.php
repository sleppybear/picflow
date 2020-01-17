<?php
$mysqli=new mysqli("localhost", "root", "", "testdb");

$upload_image=$_FILES["myimage"]["name"];
$folder="/images/";
$success=move_uploaded_file($_FILES["myimage"]["tmp_name"], __DIR__."$folder".$_FILES["myimage"]["name"]);
if($success){
    echo "Success!";
}
else echo "Fail upload:"."$success";
$mysqli->query("INSERT INTO `images` (`path`, `name`) VALUES('$folder', '$upload_image')");

$mysqli->close();