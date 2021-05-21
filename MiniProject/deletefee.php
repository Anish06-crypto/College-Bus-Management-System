<?php

$con = mysqli_connect("localhost", "root", "", "bustransport") or die(mysqli_error($con));
$select_query = "DELETE FROM fee WHERE usn = '$_GET[usn]' ";
 if($con-> query($select_query)){
     echo "Deleted";
 header("refresh:1; url=displayfees.php"); }
 else{
     echo "Not Deleted";
 header("refresh:1; url=displayfees.php"); }
?>
