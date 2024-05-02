<?php
    require_once "fetchProduct.php";
    
 if($_GET){
    
    
    $pid= $_GET['pid'];
    $ppid = $_GET['ppid'];
   
    foreach($products as $index => $product){
        if($pid == $products[$index]['id']){
            $tblname = $products[$index]["name"];
            $id = $index;
        }
    }
    $sql ="SELECT * from ".$tblname." WHERE ".$tblname."_id = $ppid";
    $result = mysqli_query($conn, $sql);

    //echo $sql;
    $col_names = get_column_names($conn, "".$tblname);

    $productInfo = array();
            
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            for($i=0;$i<count($col_names);$i++){
                array_push($productInfo,$row[$col_names[$i]]);
            }
        }   
    }
        mysqli_query($conn,$sql);

 }
 if($_POST){
    $sql = "UPDATE ".$tblname." SET ";

    for($i = 1;$i <count($productInfo);$i++){
        $new_val = $_POST[$col_names[$i]];
        $sql .= $col_names[$i].' = '."\"$new_val\"".',';
    }
    $sql = substr_replace($sql ,"", -1);
    
    if(mysqli_query($conn,$sql)){
       header("location:../productTable.php?id=".$id."&pid=".$pid); 
    }else{
        echo "something went wrong";
        echo $sql;
    }
 }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Update<?=$tblname?></title>
    </head>
    <body>
        <form method="POST" action="updateSubProduct.php?pid=<?=$pid?>&ppid=<?=$ppid?>">
        <input type="hidden" name="<?=$col_names[0]?>" value="<?=$productInfo[0]?>">
        <?php for($i = 1;$i <count($col_names);$i++){?>
                <label for="<?=$col_names[$i]?>"><?=$col_names[$i]?></label>
                <input type="text" name="<?=$col_names[$i]?>" value="<?=$productInfo[$i]?>">
        <?php }?>
        <input type="submit">
    </form>
    
    </body>
    <style>
        table,tr,td{
            border-collapse: collapse;
            border: 2px solid black;
        }    
    </style>

</html>