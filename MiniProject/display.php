<?php

$con = mysqli_connect("localhost", "root", "","bustransport") or 
die(mysqli_error($con));

$name = $_POST['Name'];
$dno = $_POST['Dno'];
$age = $_POST['Age'];
$sal = $_POST['Salary'];
$ph = $_POST['Phone'];

$sql1 = "SELECT * FROM driver WHERE D_no = '$dno'";
						$result = $con->query($sql1);
						if($result->num_rows > 0){	
							echo "<center><h3>Driver already registered</h3></center>";
                                                        header("refresh:1; url=driverregistration.php");
							$con->close();
						}
                                                else{

$insert_query = "insert into driver(D_no, D_Name, Age, Salary, phone) values ('$dno', '$name', '$age', '$sal', '$ph')";
echo "Driver Registered";
header("refresh:1; url=driverregistration.php");

$submit_query = mysqli_query($con, $insert_query) or die(mysqli_errno($con));

                                                }
?>