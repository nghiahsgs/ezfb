
<?php
include("config.php");

$tbName='tbclone';


$username=$_GET['username'];
$token=$_GET['token'];
$name=$_GET['name'];
$typeLove=$_GET['typeLove'];
$speed=$_GET['speed'];
$totalLove=$_GET['totalLove'];
$timeAdd=time();
$timeLastLove=$_GET['timeLastLove'];
$timeNextLove=$_GET['timeNextLove'];
$status=$_GET['status'];



 
$sql = "INSERT INTO ".$tbName." (`id`, `username`, `token`, `name`, `typeLove`, `speed`, `totalLove`, `timeAdd`, `timeLastLove`, `timeNextLove`, `status`)
VALUES ('', '".$username."', '".$token."', '".$name."', '".$typeLove."', '".$speed."', '".$totalLove."', '".$totalLove."', '".$timeAdd."', '".$timeLastLove."', '".$timeNextLove."', '".$status."')";


echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Add okay r";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();