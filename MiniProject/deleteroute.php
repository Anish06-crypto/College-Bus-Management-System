<?php

$con = mysqli_connect("localhost", "root", "", "bustransport") or die(mysqli_error($con));
$select_query = "DELETE FROM route WHERE route_id = '$_GET[route_id]' ";
 if($con-> query($select_query)){
     echo "Deleted";
 header("refresh:1; url=displayroute.php"); }
 else{
     echo "Not Deleted";
     header("refresh:1; url=displayroute.php"); }
?>
