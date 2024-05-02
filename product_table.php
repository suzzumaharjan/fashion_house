<?php
include 'configuration.php';
include 'fetch_category.php';

$sql="SELECT categories.cat_name as catname from ((products inner join categories on products.cat_id=categories.cat_id))";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	$i=0;
	while($row = mysqli_fetch_assoc($result)) {
        $pro[$i] = array($row['catname']);
        

        $i++;
         $_SESSION['catname']=  $row['catname'];
      }

        
}

?>