<?php header('Access-Control-Allow-Origin: *'); ?>

<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php
include("config.php");
$tbName='tbdangbaicongviec';

$sql = "SELECT `id`, `token`, `ndungBaiViet`, `linkAnh`, `timeThucHien`, `username`,`type` FROM "."`".$tbName."`";


//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["username"].'|'.$row["token"].'|'.$row["type"].'|'.$row["ndungBaiViet"].'|'.$row["linkAnh"].'|'.$row["timeThucHien"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>