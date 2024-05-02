<?php
session_start();
if($_GET)
{
	$id=$_GET['id'];
}
unset($_SESSION['item'][$id] );
unset($_SESSION['quantity'][$id]);
header('location:http://localhost/ecommerce/addtocart.php');
?>