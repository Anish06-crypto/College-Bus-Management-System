<?php

$con = mysqli_connect("localhost", "root", "","bustransport") or 
die(mysqli_error($con));

$busid = $_POST['busid'];
$cap = $_POST['cap'];
$dno = $_POST['Dno'];


$sql1 = "SELECT * FROM buses WHERE bus_id = '$busid'";
						$result = $con->query($sql1);
						if($result->num_rows > 0){	
							echo "<center><h3>Bus already registered</h3></center>";
							$con->close();
                                                        header("refresh:1; url=busadd.php");
						}
                                                else{

$insert_query = "insert into buses(bus_id, capacity, D_no) values ('$busid', '$cap', '$dno')";
echo "Bus added";
header("refresh:1; url=busadd.php");

$submit_query = mysqli_query($con, $insert_query) or die(mysqli_errno($con));

                                                }
?>