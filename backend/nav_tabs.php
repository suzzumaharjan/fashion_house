<?php 
    require_once "./core/fetchProduct.php";
    switch($active){
        case 1:
            $link = "productTable.php?pid=".$pid."&i=".$i;
            $linkName = "Lists";
            break;

        case 2:
            $link = "addProductPage.php";
            $linkName = "Add";
            break;
        
        case 3:
            $link = "showCatagories.php?";
            $linkName = "Categories";
            break;
            
        default:
            $linkName = "error";
            break;
    }

?>


<!DOCTYPE html>
<html>
    <head></head>
    <body>
    <div class="container-fluid p-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="productPage(A).php">Products</a></li>
                <li class="breadcrumb-item"><a href="productTable.php?i=<?=$i?>&pid=<?=$pid?>"><?=$products[$i]['showName']?></a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?=$link?>"><?=$linkName?></li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
    
    <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link  <?php if($active == 1){echo "active";}?>" aria-current="page" href="productTable.php?i=<?=$i?>&pid=<?=$pid?>">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($active == 2){echo "active";}?>" href="addProductPage.php">Add</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($active == 3){echo "active";}?>" href="showCatagories.php">Catagories</a>
            </li>
        </ul>
    </div>
    </body>
</html>