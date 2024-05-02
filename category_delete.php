<?php
    include "configuration.php";
   
    if($_GET){
        $cat_id = $_GET['cat_id'];
        $sql = "DELETE  FROM categories  WHERE cat_id = $cat_id";
        // echo $sql;
        if(mysqli_query($conn, $sql)){
            header('Location:http://localhost/ecommerce/addcategory.php');
            exit();
        }
        else
        {
            echo "Error deleting record: " . $conn->error;
        }
        
    }
    mysqli_close($conn);
?>