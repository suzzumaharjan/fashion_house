<?php
include "configuration.php";
   

  $sql = "SELECT * FROM users";
  
  //Fetching result from database
  $result = mysqli_query($conn, $sql);
  
  //Checking if there is data saved in the students table.
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $i = 0;
      // Looping through the results
      while($row = mysqli_fetch_assoc($result)) {
        $users[$i] = array(
          "id" => $row['id'],
          "fullname" => $row['fullname'],
           "address" => $row['address'],
          "phone" => $row['phone'],
          "email"=>$row['email'],
          "password" => $row['password'],
          
        );
        $i++;
      }
  } 

  //connection close
  
?>