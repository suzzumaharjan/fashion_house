<?php
    require_once "config.php";

    if($_POST){
        if( isset( $_SESSION['i'] ) ) {
            $i = $_SESSION['i'];
            $pid = $_SESSION['pid'];
            $tblname = $products[$i]['name'];
        }
        
        $catNames = $_POST[$tblname.'_cats'];
        $catName = Array();
        $catName = explode(",",$catNames);
        
        
        $sql = "INSERT INTO ".$tblname."_catagories (".$tblname."_catName) values (";
    
        for($j = 0;$j <count($catName);$j++){
            $sql .= "\"$catName[$j]\"),(";
        }
        $sql = substr_replace($sql ,"", -2);
            
   
        if(mysqli_query($conn,$sql)){
            header("location:../productTable.php?i=".$i."&pid=".$pid);
            
        }else{
            echo $sql;
        }
      
    }



?>