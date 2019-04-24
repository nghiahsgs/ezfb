<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php
include("config.php");
$tbName='dbmember';
$sql = "SELECT * FROM `dbmember` WHERE 1";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["username"]."=".$row["uutien"]."=".$row["soluong"]."|";
    }
} else {
    echo "0 results";
}
$conn->close();
?>