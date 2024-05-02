<?php
    require_once "config.php";

 if($_GET){
    $pid= $_GET['pid'];
    
    foreach($products as $index => $product){
        if($pid == $products[$index]['id']){
            $tblname = $products[$index]["name"];
        }
    }
    $dir ="../../images/".$tblname;
    delete_directory($dir);
    
    $sql = "DELETE FROM products WHERE productId = $pid";
    
    if(mysqli_query($conn,$sql)){
        $sql = "DROP TABLE ".$tblname;
        if(mysqli_query($conn,$sql)){
            $sql = "DROP TABLE ".$tblname."_catagories";
            mysqli_query($conn,$sql);
            header("location:../productPage(A).php"); 
        }else{
            echo "Something WEnt Wrong";
        }
    }else{
        echo "Something WEnt Wrong";
    }
    
 }
?>