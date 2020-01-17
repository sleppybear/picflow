<?php
//header("content-type:image/png");
$mysqli=new mysqli("localhost", "root", "", "testdb");
$var=$mysqli->query("select * from `images`");

while($row=mysqli_fetch_array($var))
{
    $image_name=$row["name"];
    $image_path=$row["path"];
    echo "<img src=".$image_path.$image_name." height=250>";
}