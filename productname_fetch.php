<?php
include 'configuration.php';
include 'fetch_product.php';

$sql="SELECT products.productname as productname,products.price as price from (orders inner join products on orders.productid=products.productid)";

$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	$i=0;
	while($row = mysqli_fetch_assoc($result)) {
        $prod[$i] = array($row['productname'],
        	$row['price']);
        

        $i++;
         // $_SESSION['catname']=  $row['catname'];
      }

        
}

?>