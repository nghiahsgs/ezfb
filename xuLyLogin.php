<?php 
session_start();
include('config.php');
if ($_POST && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
if(empty($_POST['username']) || empty($_POST['password'])){
exit();
}


$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT `id`, `username`, `pass`, `note` FROM tbuser";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        if($row["pass"]==$password){
             echo '2'; //success
             $_SESSION['username']=$username;
            die;
        }
    }
    
    echo '1'; //sai passs

} else {
    //echo "0 results";
    echo '0'; // tai khoan chua ton tai
}
$conn->close();
}
?>
