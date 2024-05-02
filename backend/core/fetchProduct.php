<?php
    require_once "config.php";

    $sql  = "select * from products";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $k = 0;
      while($row = mysqli_fetch_assoc($result)) {
    
        $products[$k] = Array(
            "id" => $row['productId'],
            "name" => $row['hiddenName'],
            "showName" => $row['productName'],
            "status" => $row['status']
        );
        $k++;
      }
    }

?>
