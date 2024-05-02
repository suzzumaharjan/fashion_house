<?php
    
    require_once "config.php";

    
        if( isset( $_SESSION['i'] ) ) {
            $i = $_SESSION['i'];
            $pid = $_SESSION['pid'];
            $tblname = $products[$i]['name'];
        }

        $sql = "Select * from ".$tblname."_catagories";       
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $k = 0;
            while($row = mysqli_fetch_assoc($result)) {
            $cata[$k] = array(
                "catId" => $row[$tblname."_catId"],
                "catName" => $row[$tblname."_catName"],
                "catStatus" =>$row[$tblname."_catStatus"]
                );
            $k++;
            }   
        }
    

?>