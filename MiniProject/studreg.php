<?php

$con = mysqli_connect("localhost", "root", "","bustransport") or 
die(mysqli_error($con));

$usn = $_POST['usn'];
$name = $_POST['name'];
$branch = $_POST['branch'];
$gender = $_POST['gender'];
$area = $_POST['area'];
$stopname = $_POST['stopname'];
$routenumber = $_POST['routenumber'];
$phone = $_POST['phone'];

$sql1 = "SELECT * FROM student WHERE USN = '$usn'";
						$result = $con->query($sql1);
						if($result->num_rows > 0){	
							echo "<center><h3>Student already registered</h3></center>";
                                                        header("refresh:1; url=studentreg.php");
							$con->close();
						}
                                                else{

$insert_query = "insert into student(USN, Name, branch, Gender, Area, StopName, Route_number, phone) "
        . "values ('$usn', '$name', '$branch', '$gender', '$area', '$stopname', $routenumber, $phone)";
echo "Student Registered";
header("refresh:1; url=studentreg.php");

$submit_query = mysqli_query($con, $insert_query) or die(mysqli_error($con));



                                                }
?>