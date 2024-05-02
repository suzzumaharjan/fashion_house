<?php
    require_once "fetchProduct.php";

    if($_GET){
        $pid = $_GET['pid']; 
        if( isset( $_SESSION['i'] ) ) {
            $i = $_SESSION['i'];
            $tblname = $products[$i]['name'];
            $value = $_POST['value'];
        }


        $sql = "UPDATE products set productName = \"$value\" where productId =".$pid;
        if(mysqli_query($conn,$sql)){
                header("Location:../productPage(A).php");
        }else{
            echo "Something Went Wrong";
            echo $sql;
        }
    }

?>