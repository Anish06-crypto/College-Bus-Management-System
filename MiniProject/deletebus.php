<?php

$con = mysqli_connect("localhost", "root", "", "bustransport") or die(mysqli_error($con));
$select_query = "DELETE FROM buses WHERE bus_id = '$_GET[bus_id]' ";
 if($con-> query($select_query)){
      echo "Not Deleted";
 header("refresh:1; url=displaybuses.php");}
 else{
     echo "Not Deleted";
     header("refresh:1; url=displaybuses.php"); }
?>
