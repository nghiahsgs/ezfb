
<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php
include("config.php");
$tbName='dbtinnhan';

$sql = "SELECT `id`, `idchat`, `nameChat`, `uidChat`, `Snippet`, `updated_time`, `link_read`, `ndungChat`, `note` FROM "."`".$tbName."`";

//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["idchat"].'|'.$row["nameChat"].'|'.$row["uidChat"].'|'.$row["Snippet"].'|'.$row["updated_time"].'|'.$row["link_read"].'|'.$row["ndungChat"].'|'.$row["note"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>