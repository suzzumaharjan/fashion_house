<?php
    require_once "config.php";

    $sql = "SELECT * from carousel_imgs order by Image_Order";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $k = 0;
      while($row = mysqli_fetch_assoc($result)) {
    
        $carousels[$k] = Array(
            "id" => $row['img_id'],
            "name" => $row['Image_Name'],
            "order" => $row['Image_Order']
        );
        $k++;
      }
    }
?>