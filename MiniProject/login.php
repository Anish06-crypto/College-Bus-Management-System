<?php

$con = mysqli_connect("localhost", "root", "","bustransport") or 
die(mysqli_error($con));

	//Login Script Start
  
    $email= ($_POST['email']);
    $pwd= ($_POST['pwd']);
    $select_user="SELECT * FROM admin WHERE email='$email' AND pwd='$pwd'";
    $run_user=mysqli_query($con, $select_user);
    $row_count=mysqli_num_rows($run_user);
    if ($row_count==1) {
      $_SESSION['email']=$email; //create session variable
      header('location: index.php');
    }
    else{
      echo "<script>alert('Invalid Email or Password')</script>";
    }
    //Login Script End
?>
                                                
