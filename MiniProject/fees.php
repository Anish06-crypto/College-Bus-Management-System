<?php

$con = mysqli_connect("localhost", "root", "","bustransport") or 
die(mysqli_error($con));

$tid = $_POST['tid'];
$usn = $_POST['usn'];
$amount = $_POST['amt'];
$pd = $_POST['pd'];
$ed = $_POST['ed'];

$sql1 = "SELECT * FROM fee WHERE Transaction_ID = '$tid'";
						$result = $con->query($sql1);
						if($result->num_rows > 0){	
							echo "<center><h3>Student fees already registered</h3></center>";
                                                        header("refersh:1; url=fee.html");
							$con->close();
						}
                                                else{

$insert_query = "insert into fee(Transaction_ID, usn, Amount, PayDate, ExpiryDate) values ('$tid', '$usn', '$amount', '$pd', '$ed')";
header("refresh:1; url=fee.html");

$submit_query = mysqli_query($con, $insert_query) or die(mysqli_errno($con));

                                                }
?>