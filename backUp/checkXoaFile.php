 <?php 
$uidMe=$_GET['uidMe'];
echo $uidMe."<br>";
 $ndungFile=file_get_contents($uidMe.'.txt');
    
    echo   $ndungFile;
if($ndungFile!=""){
 // echo "<td><a href='/backUp/ketqua.php?uid=".$row["uid"]."'>Đã Back Up</a></td>";
  //xoa file
  echo "xoa het";
   unlink($uidMe.'.txt');


}else{
   echo "<td>Chưa có</td>";
}


  ?>