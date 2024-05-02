<?php
include'configuration.php';
session_start();
$_SESSION['item'];
$_SESSION['quantity'];
echo $_SESSION['quantity'];
$id=$_SESSION['id'];

$sql="select max(bill_no) as bill from orders ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0)
	 {
	 	$row = mysqli_fetch_assoc($result);
     	$bill_no=$row['bill'];
     	$bill_no=$bill_no+1;
      }


for($i=0;$i<count($_SESSION['item']);$i++)
{
	$productid=$_SESSION['item'][$i];
	$quantity=$_SESSION['quantity'][$i];
	
	$sql="insert into orders(productid,id,quantity,bill_no) values('$productid','$id','$quantity','$bill_no')";
	
		mysqli_query($conn,$sql);
		header('location:http://localhost/ecommerce/index.php');

}

?>