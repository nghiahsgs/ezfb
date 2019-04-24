
<?php
include("config.php");

$tbName='tbthatimhistory';


$token=$_GET['token'];
$idPost=$_GET['idPost'];
$timeAdd=time();
$username=$_GET['username'];



 
$sql = "INSERT INTO `".$tbName."`(`id`, `token`, `idPost`, `timeAdd`, `username`) VALUES ('','".$token."','".$idPost."','".$timeAdd."','".$username."')";


echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Add okay r";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();