<?php
include 'configuration.php';
session_start();
if($_GET)
{
	$o_id=$_GET['o_id'];
	
	// if(isset($_SESSION['status']))
 //    {
 //      if($_SESSION['status'][] == 0 )
 //      {
        
          $updateStatus = "UPDATE orders set status='1' where o_id = '$o_id' ";
          
          if(mysqli_query($conn,$updateStatus))
          {
          	 header("location:http://localhost/ecommerce/orderfetch.php");
          }
         
     //    }
     // }

}

?>