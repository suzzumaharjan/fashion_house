<?php
include'configuration.php';
 $sql = "SELECT * FROM products";
 
  //Fetching result from database
  $result = mysqli_query($conn, $sql);
  
  //Checking if there is data saved in the students table.
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $i = 0;
      // Looping through the results
      while($row = mysqli_fetch_assoc($result)) {
        $products[$i] = array(
          "productid" => $row['productid'],
          "cat_id"=>$row['cat_id'],
          "productname" => $row['productname'],
          "pro_image"=>$row['pro_image'],
          "price" => $row['price'],
          
        );
        $i++;
      }
  }?>