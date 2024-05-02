<?php
    include "configuration.php";
   
    if($_GET){
        $productid = $_GET['productid'];
        $sql = "DELETE  FROM products  WHERE productid = $productid";
        // echo $sql;
        if(mysqli_query($conn, $sql)){
            header('Location:http://localhost/ecommerce/addproduct.php');
            exit();
        }
        else
        {
            echo "Error deleting record: " . $conn->error;
        }
        
    }
    mysqli_close($conn);
?>