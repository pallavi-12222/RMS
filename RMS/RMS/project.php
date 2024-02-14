<?php
$conn = mysqli_connect("localhost","root","","MENU");
if($conn)
{
echo "success";
}
else
{
echo "fail";
}
$name=$_POST["name"];
$phone_no=$_POST["mobile"];
$quantity=$_POST["quantity"];
$address=$_POST["address"];

//$query="CREATE DATABASE `MENU`";
//$query="CREATE TABLE ORDERS(NAME varchar(30),MOBILE varchar(20),QUANTITY varchar(30),ADDRESS varchar(40))";
//mysqli_query($conn,$query);
$query = "INSERT INTO ORDERS(NAME,MOBILE,QUANTITY,ADDRESS) VALUES(?,?,?,?)";
$stmt=mysqli_prepare($conn,$query);
mysqli_stmt_bind_param($stmt,'ssss',$name,$phone_no,$quantity,$address);

mysqli_execute($stmt);
session_start();
$_SESSION['username']=$_POST['name'];
if(!isset($_SESSION['username']))
{
 header("location:MENU.html");
 exit();
}
$uname=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.js"></script>
</head>
<body>
<center><h1 class="text-success"> <i> thanks for ordering   <?php echo $uname;?></i></h3></center>
<center><img src="v1.jpg" height="500"width="900"></center>
</body>
</html>
