<?php 
//listCongViecUpTop.php
 ?>
<?php header('Access-Control-Allow-Origin: *'); ?>

<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php
include("config.php");
$tbName='tbuptopcongviec';

$sql = "SELECT `id`, `idPost`, `token`, `ndungCmt`, `timeThucHien`, `username` FROM "."`".$tbName."`";


//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["token"].'|'.$row["idPost"].'|'.$row["username"].'|'.$row["ndungCmt"].'|'.$row["timeThucHien"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>