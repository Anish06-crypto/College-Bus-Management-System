<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "bustransport";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}

if( isset($_GET['search']) ){
    $usn = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT student.usn,student.name,student.branch,student.route_number,route.bus_number FROM student,route WHERE student.route_number=route.route_id and student.usn ='$usn'";
}


if( isset($_GET['search1']) ){
    $branch = mysqli_real_escape_string($con, htmlspecialchars($_GET['search1']));
    $sql1 = "SELECT student.usn,student.name,student.branch,student.route_number,route.bus_number FROM student,route WHERE student.route_number=route.route_id and student.branch ='$branch'";
}
$result = $con->query($sql);
$result1 = $con->query($sql1);
?>
<!DOCTYPE html>
<html>
<head>
<title>Search</title>
<!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>CBTM</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
     <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #d96459;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }
        th{
           background-color: #d96459;
           color: white;
        } 
        tr:nth-child(even) {background-color: #f2f2f2}
        
        @media print {
            /*Hide every other element*/
            body * {
                visibility: hidden;
            }
            /*Then displaying print container elements*/
            .print-container, .print-container * {
                visibility: visible;
            }
           
            }
            
        
    </style> 
</head>
<body class="main-layout">
      <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.php"><img src="images/unnamed.jpg" alt="logo" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-10">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="send"> <a href="index.php">Go Back</a> </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- end header inner -->
    </header>
    <!-- end header -->
    <button class="send" onclick="window.print();">
    Print
</button>
<div class="container">
    <label><h1>Search</h1></label>
<form action="search1.php" method="GET">
<input class="contactus" type="text" placeholder="Type the usn here" name="search">&nbsp;
<input class="send" type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
<input class="contactus" type="text" placeholder="Type the branch here" name="search1">&nbsp;
<input class="send" type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
    <div class="print-container">
<h2>Bus And Student Details</h2>
<table>
<tr>
<th>USN</th>
<th>Name</th>
<th>Branch</th>
<th>Route_Number</th>
<th>Bus_Number</th>
</tr>
<?php
if($result){
while($row = $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['usn']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['branch']; ?></td>
    <td><?php echo $row['route_number']; ?></td>
    <td><?php echo $row['bus_number']; ?></td>
    
    </tr>
    <?php
}
}
if($result1){
while($row = $result1->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['usn']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['branch']; ?></td>
    <td><?php echo $row['route_number']; ?></td>
    <td><?php echo $row['bus_number']; ?></td>
    
    </tr>
    <?php
}
}
?>
</table>
    </div>
</div>
    <!--  footer -->
    <footer id="footer_with_contact">
        <div class="footer">                 
            <div class="copyright">
                <p>© 2020 All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>