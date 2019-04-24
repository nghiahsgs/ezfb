<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php
include("config.php");
$tbName='tbthatimclone';


$sql = "SELECT `id`, `username`, `token`, `name`, `typeLove`, `speed`, `totalLove`, `timeAdd`, `timeLastLove`, `timeNextLove`, `status`, `loaiCamXuc`, `ndungCmt`,`linkAnhCmt` FROM "."`".$tbName."`";

//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["token"].'|'.$row["username"].'|'.$row["name"].'|'.$row["typeLove"].'|'.$row["speed"].'|'.$row["totalLove"].'|'.$row["timeAdd"].'|'.$row["timeLastLove"].'|'.$row["timeNextLove"].'|'.$row["status"].'|'.$row["loaiCamXuc"].'|'.$row["ndungCmt"].'|'.$row["linkAnhCmt"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>