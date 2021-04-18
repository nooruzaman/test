<?php
session_start();

$connection=mysqli_connect('localhost','root', 'root', 'user_accounts') or die("COULD NOT CONNCT".mysqli_connect_error());

//mysqli_select_db($connection, 'user_accounts');
$name = $_POST['user'];
$pwd  = $_POST['password'];
$sql_query=" select * from user where username='$name' && password='$pwd' ";
$sql_result=mysqli_query($connection,$sql_query);
$num=mysqli_num_rows($sql_result);
if ($num==1){
	$row = mysqli_fetch_array($sql_result);
	$_SESSION['username']= $row['username'];
	$_SESSION['fName']= $row['fName'];
	$_SESSION['lName']= $row['lName'];
	$_SESSION['State']= $row['state'];
	$_SESSION['Country']= $row['country'];
	header('location:home.php');
}
else
{
	$_SESSION['error']= "Login failed ... Username and/or Password not correct!";
	header('location:login.php');
}

?>


