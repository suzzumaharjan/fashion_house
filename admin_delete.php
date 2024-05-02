<?php
    include "configuration.php";
   
    if($_GET){
        $id = $_GET['id'];
        $sql = "DELETE  FROM admins  WHERE id = $id";
        // echo $sql;
        if(mysqli_query($conn, $sql)){
            header('Location:http://localhost/ecommerce/adminfetch.php');
            exit();
        }
        else
        {
            echo "Error deleting record: " . $conn->error;
        }
        
    }
    mysqli_close($conn);
?>