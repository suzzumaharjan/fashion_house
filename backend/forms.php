
<?php
    
  require_once "config.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <caption>product form</caption>
    <form method="POST" action="addProduct.php">
        <input type="text" name="p_name">
        <input type="text" name="p_add">
        <input type="submit">
    </form>
    <table>
        <thead>
            <tr>
                <td>Sn</td>
                <td>id</td>
                <td>Name</td>
                <td>Status</td>
                <td>Delete</td>
            </tr>
        </thead>
    <?php foreach($products as $index =>$product){?>
            
            <tr>
              <td><?=$index+1?></td>
              <td><?=$product["id"]?></td>
              <td><?=$product["name"]?></td>
              
              <td> <?=$product['status']?></td>
              <td><a href="deleteProduct.php?id=<?=$product["id"]?>">delete</a></td>
           
            </tr>
          
          <?php }?>
    </table>
    
    <ul>
        <?php for($i = 0;$i < count($products);$i++) { ?>
            <li><a href="productTable.php?id=<?=$i?>&pid=<?=$products[$i]['id']?>"><?=$products[$i]['name']?></a></li>
        <?php }?>
        </ul>
</body>
<style>

</style>

</html>