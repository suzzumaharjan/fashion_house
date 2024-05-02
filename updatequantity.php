<?php
session_start();
if($_POST)
{
	$id=$_POST['id'];
	$value=$_POST['value'];
	$_SESSION['quantity'][$id]=$value;

}
?>