<?php
include 'configuration.php';
include 'fetchuser1.php';

$sql="SELECT users.fullname as fullname,users.address as address from (orders inner join users on orders.id=users.id)";

$result= mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	$i=0;
	while($row = mysqli_fetch_assoc($result)) {
        $user[$i] = array($row['fullname'],
        	$row['address']);
        

        $i++;
         // $_SESSION['catname']=  $row['catname'];
      }

        
}

?>