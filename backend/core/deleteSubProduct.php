<?php
    require_once "config.php";

 if($_GET){
    $pid= $_GET['pid'];
    $ppid = $_GET['ppid'];
    if( isset( $_SESSION['i'] ) ) {
        $i = $_SESSION['i'];
        $pid = $_SESSION['pid'];
        $tblname = $products[$i]['name'];
    }

    $imgPath = "../images/".$tblname."/".$fileName;
    if(!unlink($imgPath)){
        echo "Something went Wrong!!!";    
    }

    $sql = "DELETE FROM ".$tblname." WHERE ".$tblname."_Id = $ppid";
    
    if(mysqli_query($conn,$sql)){   
        header("location:../productTable.php?i=".$i."&pid=".$pid); 
    }else{
        echo "Something WEnt Wrong";
    }
 }
?>