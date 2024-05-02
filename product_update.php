<?php
    //including the configuration file.
    include 'configuration.php';
    include 'fetch_category.php';
    include 'product_table.php';

    // //If something has been posted from the form
    if($_POST){
        // print_r($_POST);
        $productname = $_POST['productname'];
         $pro_image=$_FILES['file']['name'];
        $price = $_POST['price'];
        $cat_id=$_POST['cat_id'];
        $productid = $_POST['productid'];
        $folder="image/".$pro_image;
        unlink($folder);
        if(empty($pro_image))
        {
          $sql = "UPDATE products SET productname = '$productname',cat_id='$cat_id',cat_name='$cat_name',price='$price' WHERE productid = $productid";
           if(mysqli_query($conn, $sql))
            {
            echo "Record updated successfully.";
            mysqli_close($conn);
            header('Location: http://localhost/ecommerce/addproduct.php');
           
            }
        }
        else
        {
          $sql = "UPDATE products SET productname = '$productname',pro_image='$pro_image',cat_id='$cat_id',cat_name='$cat_name',price='$price'  WHERE productid = $productid";
        if(mysqli_query($conn, $sql))
        {
            echo "Record updated successfully.";
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $folder))
            {
              echo "image upload successfully!!";
            }
            else
            {
             echo "failed to image upload successfully!!"; 
            }
            mysqli_close($conn);
            header('Location: http://localhost/ecommerce/addproduct.php');
        }
      
         else
         {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }

        }
      }
        
    
    if($_GET){
        $productid = $_GET['productid'];
        $sql = "SELECT * FROM products WHERE productid = $productid";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $product = array(
                    "productid" => $row['productid'],
                    "productname" => $row['productname'],
                    "cat_id"=>$row['cat_id'],
                    "pro_image"=>$row['pro_image'],
                     "price" => $row['price'],
                      
                );
            }
        } else {
          echo "No records found!!";
          exit;
        }
        // print_r($student);exit;
    }
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      Fieldset and label example
    </title>
  </head>
  <body>
    <script>
         function validation()
         {
            var price=document.forms['meroform']['price'];
            if(price.value=="")
            {
              alert('enter the price');
              return false;
            }
            else
            {
              return true;
            }
         }
       </script>
    <form name="meroform" id="myform" method="POST" enctype="multipart">
      <fieldset style="width:200px; height: 610px; background-color: beige;">
          <h1>Producr form</h1>
            <p>Product_Name:</p>
           <input type="hidden" name="productid" value="<?=$product['productid']?>" />
            <input
                type="text"
                placeholder="Enter your full name"
                name="productname"
                id="productname"
                value = "<?=$product['productname']?>"
                required
              />
              <p>Product Image:</p>
           <input type="file" name="file" id="file"/>
           <p> Category_Name</p>
           <select name="cat_id">
             <?php foreach($categories as $index => $category) {?>
                <option value="<?=$category['cat_id']?>"<?php if ($category['cat_id']==$product['cat_id'])
                {
                  echo 'selected';
                }?>><?=$category['cat_name']?></option>
                <?php }?>
            </select>
              <p>Price</p>
              <input
                type="number"
                name="price"
                id="price"
                value = "<?=$product['price']?>"
                required
              />
              <br/>
              <button   id="sub" onclick="return validation();" >Submit</button>
      </fieldset>
    </form>
  </body>

  <style>
     #myform
    {
     margin-left: 600px;
     margin-top: 40px;
    

    
     
    }
    #myform h1
    {
      text-align: center;
      font-weight: bold;
      font-family: sans-serif;
      margin-top: -4px;
    } 
    #myform p
    {
      font-size: 25px;
      font-weight: bold;
      font-family: sans-serif;
      margin-left:  13px;
      padding-bottom: -10px;
      padding-top: 0px;
      padding-bottom: 0px;


     
    
    }
   input[type="text"],input[type="number"]
    {
      width: 260px;
      height: 30px;
      margin-top : -110px;
      margin-left:  20px;
      font-size: 20px;
      border: 3px solid black;
      border-radius: 44px;
      padding-bottom: 0px;
      padding-top: 0px;
      
      
    }
    input[type="file"]
  {
    width: 260px;
      height: 30px;
      margin-top : -100px;
  }  
  select
    {
      width: 260px;
      height: 30px;
      margin-top : -200px;
    }
    input:hover
    {
      border-color: #ffc400ec; 
    }
    #sub
    {
      margin-top: 20px;
      margin-left: 100px;
      width: 100px;
      height: 40px;
      font-weight: bold;
      font-size: 24px;
      color: black;
      border: 1px solid black ;
      border-radius: 40px;
   
    } 
    #sub:hover { background-color: #ffc400ec; } 
    table 
      { 
        margin-top: 60px;
       }
       table  a
       {
        color: black;
       }
       table img
       {
        width: 60%;
       }
    
  </style>
</html>
