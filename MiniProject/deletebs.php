<?php

$con = mysqli_connect("localhost", "root", "", "bustransport") or die(mysqli_error($con));
$select_query = "DELETE FROM bus_stops WHERE route_number = '$_GET[route_number]' ";
 if($con-> query($select_query)){
     echo "Not Deleted";
 header("refresh:1; url=displaybustops.php"); }
 else{
     echo "Not Deleted";
     header("refresh:1; url=displaybustops.php");}
?>
