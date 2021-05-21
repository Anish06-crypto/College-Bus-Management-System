<?php

$con = mysqli_connect("localhost", "root", "", "bustransport") or die(mysqli_error($con));
$select_query = "DELETE FROM student WHERE usn = '$_GET[usn]' ";
 if($con-> query($select_query)){
     echo "Deleted";
 header("refresh:1; url=displaystudents.php"); }
 else{
     echo "Not Deleted";
     header("refresh:1; url=displaystudents.php");
 }
?>

