    <?php
    require_once "config.php";

    if($_POST){
       
        if( isset( $_SESSION['i'] ) ) {
            $i = $_SESSION['i'];
            $pid = $_SESSION['pid'];
            $tblname = $products[$i]['name'];
        }
    
        $col_names = get_column_names($conn,$tblname);
    
        $countfiles = count($_FILES['file']['name']);
        for($k=0;$k<$countfiles;$k++){
            $filename = $_FILES['file']['name'][$k];
            // Upload file
            // echo $filename."<br>";
            $location = '../../images/'.$tblname.'/'.$filename;
            // echo $location."<br>";
            move_uploaded_file($_FILES['file']['tmp_name'][$k],$location);
        }


        $sql = "INSERT INTO ".$tblname."(";
    
        for($j = 1;$j <count($col_names);$j++){
            $sql .= $col_names[$j].',';
        }

        $sql = substr_replace($sql ,"", -1);
        $sql .= ") values ("; 
        
        $col_name = Array();
        $sql .= "\"$filename\",";
        
        for($j = 2;$j <count($col_names);$j++){
            $col_name[$j] = substr($col_names[$j], strlen($tblname."_"));
            $new_val = $_POST[$col_name[$j]];
            $sql .= "\"$new_val\"".',';
        }
        $sql = substr_replace($sql ,"", -1);
        
        $sql .= ")";    
        //echo $sql;
        if(mysqli_query($conn,$sql)){
           header("location:../productTable.php?i=".$i."&pid=".$pid); 
        }else{
            echo "something went wrong";
            echo $sql;
        }
     }

?>