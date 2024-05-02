<?php
    require_once "dashboard_nav.php";
    require_once "./core/config.php";

    $active = 2;
        if( isset( $_SESSION['i'] ) ) {
            $i = $_SESSION['i'];
            $pid = $_SESSION['pid'];
            $tblname = $products[$i]['name'];
        }
        $col_names = get_column_names($conn,$tblname);
    
    foreach($col_names as $index => $col_name){
        $col_names[$index] = substr($col_name, strlen($tblname."_"));
    }
    include_once "./core/fetchCatagory.php";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title><?=$tblname?></title>
    </head>
    <body>
    <?php include "nav_tabs.php"?>
    <div class="flex">
    <form method="POST" action="./core/addSubProduct.php?pid=<?=$pid?>" enctype="multipart/form-data">
        <?php for($i = 1;$i <count($col_names);$i++){?>
                <label for="<?=$col_names[$i]?>"><?=$col_names[$i]?></label>
                <?php if($col_names[$i] == "catagory"){?>
                    <select name="<?=$col_names[$i]?>">
                        <?php foreach($cata as $j => $cat){?>
                            <option value="<?=$cat["catId"]?>"><?=$cat["catName"]?></option>
                        <?php }?>
                    </select>
                <?php }else if($col_names[$i] == "Status"){?>
                    <select name="<?=$col_names[$i]?>">
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                    </select>    
                <?php }else if($col_names[$i] == "Image"){?>
                    <div class="mb-3">
	                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="file[]" required multiple>
	                </div>
                <?php }else{?>
                    <input type="text" name="<?=$col_names[$i]?>" required>
                
        <?php }}?>
        <input type="submit">
    </form>
    
</div>
    </body>
</html>