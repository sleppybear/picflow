<form method="GET">
    <input type="submit" name="display" value="Display">
</form>
<?php
//header("content-type:image/png");
if (isset($_GET['display'])) {
    $con =  \db\DbConnection::Instance();
    $var = $con->query("SELECT * from `images`");
        while ($row = mysqli_fetch_array($var)) {
        $images[$row["name"]] = $row["path"];
    }
    echo "<div class=\"wrapper\">\n";
    echo "<ul class=\"min\">\n";
    $i = 0;
    foreach ($images as $name => $path) {
        echo "<li><a href=\"#img" . $i . "\"><img src=\"" . $path . $name . "\" width=\"100\"/></a></li>\n";
        $i++;
    }
    echo "</ul>\n";
    echo "<div class=\"images\">\n";
    $i = 0;
    foreach ($images as $name => $path) {
        echo "<div><a name=\"img" . $i . "\"></a><img alt=\"\" src=\"" . $path . $name . "\" width=\"800\"/></div>\n";
        $i++;
    }
    echo "</div>\n";
    echo "</div>\n";
    //echo "<img src=".$image_path.$image_name." height=250>\n";
}