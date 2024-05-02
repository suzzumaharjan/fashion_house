<?php
    
    require_once "./core/config.php";
    require_once "dashboard_nav.php";

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
    <div class="container">
        <div class="row">
            <p>
                <span class="col-1">Add new Product</span>
                <span class="col-2"><button type="button"  onclick="showForm();" class="btn btn-primary"><i class="fas fa-plus"></i></button></span>
            </p>
        </div>
        <div class="row">
            <form class="modified-todolist" method="POST" action="./core/addProduct.php">
                <label for="p_name">Enter Product Name :</label>
                
                <input type="hidden" id="p_add" name="p_add">
                <input type="text" name="p_name" placeholder="name" required>
                <button type="button" id="input-adder" onclick="newInput();" class="btn btn-primary"><i class="fas fa-plus"></i></button> 
                <div class="inputs col-3">
                    <!-- baki additional comes here -->
                </div>
                <br>
                <input type="submit">
            </form>
        </div>
    
    </div>
    
<ul class="ul-list" id="myUL">
</ul>
    <div class="col-8 p-3 table-responsive">
        <table class="table table-success table-hover table-bordered border-dark caption-top">
            <caption>Available Product Catagories</caption>
            <thead>
                <tr>
                    <td>S.N.</td>
                    <td>Product Name</td>
                    <td>Status</td>
                    <td>Update</td>
                    <td>Delete</td>
                    <td>Go To</td>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($products)){foreach($products as $index => $product){?>
                <tr>
                    <td><?=$index+1?></td>
                    <td><?=$product['showName']?></td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php if($product['status']==1){echo "checked";}?>>
                        </div>
                    </td>
                    <td>
                        <button id="updateBtn_<?=$index?>" type="button" class="btn btn-primary" onclick="updateForm(<?=$index?>,1);"><i class="fas fa-pen-alt"></i></button>
                            <form id="formUpdate_<?=$index?>" action="./core/updateProduct.php?pid=<?=$product['id']?>" method="POST" style="display: none;">
                                <input type="text" value="<?=$product['name']?>" name="value">
                                <input type="submit">
                            </form> 
                    </td>
                    <td><a href="./core/deleteProduct.php?pid=<?=$product["id"]?>"><i class="fas fa-pen-alt"></i></a></td>
                    
                    <td><a href="productTable.php?i=<?=$index?>&pid=<?=$product['id']?>"><i class="fas fa-long-arrow-alt-right"></i></a></td>
                </tr>
                <?php }}?>
            </tbody>
        </table>
    </div>
    <script src="../script/script.js"></script>
    <script>
        var count = 0;
        document.onload = function(){
            count = 0;
        } 

        function newInput(){
            let inputs = document.querySelector(".inputs");
            let input_name = document.createElement('input');
            let closeBtn = document.createElement('button');
            closeBtn.classList.add("btn");
            closeBtn.classList.add("btn-primary");
            closeBtn.classList.add("close");
            let temp = "input_"+count;
            input_name.name = temp;
            input_name.id = temp;
            let icon = document.createElement('i');
            icon.classList.add("far");
            icon.classList.add("fa-times-circle");
            
            closeBtn.onclick = function(){
                this.remove();
                document.getElementById(temp).remove();
                count--;
            };
            closeBtn.appendChild(icon);          
            inputs.appendChild(input_name);
            inputs.appendChild(closeBtn);
            count++;
        }

        function showForm(){
            let faram = document.querySelector(".modified-todolist");
            faram.style.display = "block";
        }

    </script>
    <style>
        .modified-todolist{
            display: none;
        }

    </style>
</body>

</html>