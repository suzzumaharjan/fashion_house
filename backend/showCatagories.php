<?php
$active = 3;

    require_once "dashboard_nav.php";
    require_once "./core/config.php";

        

        if( isset( $_SESSION['i'] ) ) {
            $i = $_SESSION['i'];
            $pid = $_SESSION['pid'];
            $tblname = $products[$i]['name'];
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
        <form method="POST" action="./core/addSubCatagory.php?pid=<?=$pid?>">
            <label for="<?=$tblname?>_cats">Cat Name</label>
            <input type="text" name="<?=$tblname?>_cats" placeholder="catnames"/>
            <input type="submit">
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-success table-hover table-bordered border-dark caption-top">
        <caption><?=$tblname?> Catagories</caption>
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Update</td>
                    <th>Delete</td>
                </tr>
            </thead> 
            <?php foreach($cata as $index =>$cat){?>
            <tbody>
                <tr>
                    <td><?=$index+1?></td>
                    <td><?=$cat['catName']?></td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php if($cat['catStatus']==1){echo "checked";}?>>
                        </div>
                    </td>                        
                    <td>
                        <button id="updateBtn_<?=$index?>" type="button" <?php if($cat['catId'] == 1){ echo "style='display:none;'";}?> class="btn btn-primary" onclick="updateForm(<?=$index?>,1);"><i class="fas fa-pen-alt"></i></button>
                        <form id="formUpdate_<?=$index?>" action="./core/updateCatagory.php?cid=<?=$cat['catId']?>" method="POST" style="display: none;">
                            <input type="text" value="<?=$cat['catName']?>" name="value">
                            <input type="submit">
                            <button id="cancel" onclick="updateForm(<?=$index?>,0);"><i class="far fa-times-circle"></i></button>
                        </form>     
                    </td>
                    <td>
                        <a <?php if($cat['catId'] == 1){ echo "style='display:none;'";}?> onclick=" return confirm('Sure Delete>');" href="deleteCatagory.php?cid=<?=$cat['catId']?>"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php }?>
            <tbody>
        </table>
        </div>
        
        <script src="../script/script.js"></script>
    </body>
</html>