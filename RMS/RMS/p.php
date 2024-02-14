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
$selectedItems = $_POST["item"];
$selectedpayment = $_POST["payment"];

//$query="CREATE DATABASE `MENU`";
//$query="CREATE TABLE MENU_DETAIL(NAME varchar(30),MOBILE varchar(20),QUANTITY varchar(30), ADDRESS varchar(70),ITEM varchar(50),PAYMENT varchar(60))";

//mysqli_query($conn,$query);
$query = "INSERT INTO MENU_DETAILS(NAME,MOBILE,QUANTITY,ADDRESS,ITEM,PAYMENT) VALUES(?,?,?,?,?,?)";
$stmt=mysqli_prepare($conn,$query);
mysqli_stmt_bind_param($stmt,'ssssss',$name,$phone_no,$quantity,$address,$selectedItems,$selectedpayment);

mysqli_execute($stmt);
?>
