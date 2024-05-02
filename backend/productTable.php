<?php
    require_once "dashboard_nav.php";
    require_once "./core/fetchProduct.php";

    if($_GET){
        $pid = $_SESSION['pid'] = $_GET['pid'];
        $i = $_SESSION['i'] = $_GET['i'];

        $tblname = $products[$i]['name'];
        
        
        $col_names = get_column_names($conn,$tblname);
        
        include_once "./core/fetchCatagory.php";
        $active = 1;
        
        
        $total = array();
            
        foreach($cata as $index => $cat){
            $productNames = array();
            $temp_CatId = $cat['catId'];
            $sql= "SELECT * FROM ".$tblname." where ".$tblname."_catagory = \"$temp_CatId\"";
        
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                $k = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    $productName = array();
                    for($j=0;$j<count($col_names);$j++){
                        array_push($productName,$row[$col_names[$j]]);
                    }
                    array_push($productNames,$productName);
                    $k++;
                }   
            }
            array_push($total,$productNames); 
        }
        
        foreach($col_names as $index => $col_name){
            $col_names[$index] = substr($col_name, strlen($tblname."_"));
        }
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title><?=$tblname?></title>
    </head>
    <body>
        <?php include "nav_tabs.php"?>
   
    
    <div class="container ">

    <?php foreach($total as $k => $productNames){?>
        <div class="table-responsive">
        <table class="table table-success table-hover table-bordered border-dark caption-top">
        <caption><?=$cata[$k]['catName']?></caption>
            <thead>
                <tr>
                    <?php for($j=0;$j<count($col_names)-1;$j++){?>
                        <th><?=$col_names[$j]?></th>
                    <?php }?>
                    <th>Update</td>
                    <th>Delete</td>
                </tr>
            </thead> 
            <?php foreach($productNames as $index =>$productName){?>
            <tbody>
                <tr>
                    <td><?=$index+1?></td>
                    <?php for($j=1;$j<count($col_names)-1;$j++){?>
                        <?php if($col_names[$j] == "Status"){?>
                            
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php if($productName[$j]==1){echo "checked";}?>>
                                </div>
                            </td> 
                        <?php }else{?>
                            <td><?=$productName[$j]?></td>
                        <?php }?>
                    <?php }?>
                    <td><a href="./core/updateSubProduct.php?ppid=<?=$productName[0]?>&pid=<?=$pid?>"><i class="fas fa-pen-alt"></i></a></td>
                    <td><a href="./core/deleteSubProduct.php?ppid=<?=$productName[0]?>&pid=<?=$pid?>"><i class="far fa-trash-alt"></i></a></td>
                </tr>
            <?php }?>
            <tbody>
        </table>
        </div>
    <?php }?>
    
    </div>
        </body>
</html>