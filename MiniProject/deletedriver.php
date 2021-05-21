<?php

$con = mysqli_connect("localhost", "root", "", "bustransport") or die(mysqli_error($con));
$select_query = "DELETE FROM driver WHERE D_no = '$_GET[D_no]' ";
 if($con-> query($select_query)){
     echo "Deleted";
 header("refresh:1; url=displaydrivers.php"); }
 else{
     echo "Not Deleted";
      header("refresh:1; url=displaydrivers.php");
 }
?>
