<?php
    require_once "config.php";

    if($_GET){
        $id= $_GET['id'];
    
        $sql = "DELETE FROM carousel_imgs WHERE img_id = \"$id\"";
        
            if(mysqli_query($conn,$sql)){
                header("Location:../carousel.php");        
            }
            }else{
                echo "Something WEnt Wrong";
            }
    mysqli_close($conn);
?>