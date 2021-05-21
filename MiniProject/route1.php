<?php

$con = mysqli_connect("localhost", "root", "","bustransport") or 
die(mysqli_error($con));

$rid = $_POST['routeid'];
$at = $_POST['at'];
$dt = $_POST['dt'];
$busid = $_POST['busno'];

$sql1 = "SELECT * FROM route WHERE route_id = '$rid'";
						$result = $con->query($sql1);
						if($result->num_rows > 0){	
							echo "<center><h3>Driver already registered</h3></center>";
                                                        header("refersh:1; url=route.html");
							$con->close();
						}
                                                else{

$insert_query = "insert into route(route_id, arrival_time, departure_time, bus_number) values ('$rid', '$at', '$dt', '$busid')";
echo "Route Added";
header("refresh:1; url=route.html");

$submit_query = mysqli_query($con, $insert_query) or die(mysqli_errno($con));

                                                }
?>