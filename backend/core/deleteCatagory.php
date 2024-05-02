<?php
    require_once "config.php";

    if($_GET){
        $catId= $_GET['cid'];
    

        if( isset( $_SESSION['i'] ) ) {
            $i = $_SESSION['i'];
            $tblname = $products[$i]['name'];
            $value = $_POST['value'];
        }

        $sql = "UPDATE ".$tblname." SET ".$tblname."_catagory = '1' where ".$tblname."_catagory =".$catId;
        if(mysqli_query($conn,$sql)){
            $sql = "DELETE FROM ".$tblname."_catagories WHERE ".$tblname."_catId = $catId";
        
            if(mysqli_query($conn,$sql)){
                header("Location:../showCatagories.php?pid=".$pid);        
            }
            }else{
                echo "Something WEnt Wrong";
            }
        }
       
            
        
     

?>