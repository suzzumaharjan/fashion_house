<?php
    require_once "config.php";

    if($_GET){
        if( isset( $_SESSION['i'] ) ) {
            $i = $_SESSION['i'];
            $tblname = $products[$i]['name'];
            $value = $_POST['value'];
        }

        $sql = "UPDATE ".$tblname."_catagories SET ".$tblname."_catName = \"$value\" where ".$tblname."_catId =".$_GET['cid'];
        if(mysqli_query($conn,$sql)){
            header("Location:../showCatagories.php?pid=".$pid);
        }else{
            echo "Something Went Wrong";
            echo $sql;
        }
        

    }

?>