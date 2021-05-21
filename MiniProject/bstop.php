<?php

$con = mysqli_connect("localhost", "root", "","bustransport") or 
die(mysqli_error($con));

$area = $_POST['area'];
$rno = $_POST['rno'];
$scode = $_POST['scode'];
$sname = $_POST['sname'];

$sql1 = "SELECT * FROM bus_stops WHERE stopcode = '$scode'";
						$result = $con->query($sql1);
						if($result->num_rows > 0){	
							echo "<center><h3>Stop already registered</h3></center>";
                                                        header("refresh:1; url=bstops.html");
							$con->close();
						}
                                                else{

$insert_query = "insert into bus_stops(area, route_number, stopcode, stopname) values ('$area', '$rno', '$scode', '$sname')";
echo "Stop Registered";
header("refresh:1; url=bstops.html");

$submit_query = mysqli_query($con, $insert_query) or die(mysqli_errno($con));

                                                }
?>