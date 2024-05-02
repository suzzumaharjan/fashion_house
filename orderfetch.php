<?php
include'configuration.php';
include'userinfo_fetch.php';
include'productname_fetch.php';
 include'dashboardmain.php';

 $sql = "SELECT * FROM orders order by bill_no";
 
  //Fetching result from database
  $result = mysqli_query($conn, $sql);
  
  //Checking if there is data saved in the students table.
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $i = 0;
      // Looping through the results
      while($row = mysqli_fetch_assoc($result)) {
        $orders[$i] = array(
          "o_id" => $row['o_id'],
          "productid"=>$row['productid'],
          "id"=>$row['id'],
          "quantity" => $row['quantity'],
          "status" => $row['status'],
          "order_date"=>$row['order_date'],
          "bill_no"=>$row['bill_no']
        );
        $i++;
      $_SESSION['status']=$row['status'];
      $_SESSION['o_id']=$row['o_id'];
      }

      
      
      
  }
?>
<!DOCTYPE html>
<html>
  <head>
   <link rel="stylesheet" type="text/css" href="r.css">
 
  </head>
    <style type="text/css">
      table
      {
        margin-left: 290px;
        margin-top: 90px;
        border:1px solid black;

        border-collapse: collapse;
      }
      td,th
      {
         border:1px solid black;
           padding: 10px 15px;

      }
     table a
			{
				text-decoration: none;
				border:1px solid black;
				/*border-width: 100px;*/
				padding: 10px 30px;
				border-radius: 10px;
				color: white;
				background-color: black;
				/*width: 800px;*/
				height: 50px;
			}
     
    </style>
  <body>
    <table >
        <tr>
            <th>S.N.</th>
            <th>Full Name</th>
            <th>Adress</th>
            <th>Product name</th>
            <th>Price</th>
             <th>Quantity</th>
            <th>Status</th>
            <th>Bill No</th>
           <th>Action</th>
        </tr>
        <?php foreach($orders as $index =>$order){ ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$user[$index][0]?></td>
            <td><?=$user[$index][1]?></td>
            <td><?=$prod[$index][0]?></td>
            <td><?=$prod[$index][1]?></td>
            <td><?=$order['quantity']?></td>
            <td><?=$order['status']?></td>
            <td><?=$order['bill_no']?></td>
             <td>
                <a href="http://localhost/ecommerce/updatestatus.php?o_id=<?=$order['o_id']?>">Completed</a>

            </td>
        </tr>
        <?php } ?>
    </table>
  </body>
</html>
