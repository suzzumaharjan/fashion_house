

<?php
  include 'configuration.php';
 include 'dashboardmain.php'; 
  // include 'fetch_category.php';
  
  $sql_category = "SELECT DISTINCT cat_id From categories";
    $result_category = mysqli_query($conn,$sql_category);
    
    if (mysqli_num_rows($result_category) > 0) {
      // output data of each row
        $i = 0;  
      // Looping through the results
      while($row = mysqli_fetch_assoc($result_category)) {
        $cat_id[$i] = $row['cat_id'];
        $i++;
      }

  }

  $total = array();
 
  for($j=0;$j<count($cat_id);$j++)
  {
    $sql_product = "SELECT * FROM products where cat_id=$cat_id[$j]";
   
    $result_product = mysqli_query($conn, $sql_product);
    
  if (mysqli_num_rows($result_product) > 0 ) 
  {
      $i=0;
      $products = array();
      while($row = mysqli_fetch_assoc($result_product)) 
      {
        $catid = $row['cat_id'];
        $sql1 = "SELECT cat_name as catname from categories where cat_id = $cat_id[$j]";
        
        $row1 = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
        $products[$i] = array(
          "productid"=>$row['productid'],
          "cat_name"=>$row1['catname'],
          "productname"=>$row['productname'],
          "pro_image"=>$row['pro_image'],
         "price"=>$row['price'],
         "cat_id"=>$row['cat_id'],
        );
        
  
      $i++;
      }
      array_push($total, $products);
     
    }
     
  } 
   if($_POST)
  {
     $productname = $_POST['productname'];
     $pro_image=$_FILES['file']['name'];
     $cat_id=$_POST['cat_id'];
     $price = $_POST['price'];
     $folder="image/".$pro_image;
     echo $pro_image;
     
       echo $folder;
     $sql="insert into products (cat_id,productname,pro_image,price)values('$cat_id','$productname','$pro_image','$price')";
     
     if (mysqli_query($conn,$sql))
     {
      if(move_uploaded_file($_FILES["file"]["tmp_name"], $folder))
{
  echo "image upload successfully!!";
}
else
{
 echo "failed to image upload successfully!!"; 
}
  }
       header('Location: http://localhost/ecommerce/addproduct.php');
       }
       

 mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="r.css">
    <script src="https://kit.fontawesome.com/0acf56a1e1.js" crossorigin="anonymous"></script>
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
     
  </head>
  <body>
    <form  name="meroform" id="myform" method="POST" action="addproduct.php"  enctype="multipart/form-data">
      <fieldset style="width:200px; height: 610px; background-color: beige;">
         <h1>products form</h1>
            <p>Product Name:</p>
           <input type="text" name="productname">
           <p>Product Image:</p>
           <input type="file" name="file" value=""/>
           <p>Category Name</p>
            <select name="cat_id">
             <?php foreach($categories as $index => $category){?>
              <option value="<?=$category['cat_id']?>"><?=$category['cat_name']?></option>
                <?php } ?>
           </select> 
           <p>Price:</p>
           <input type="number" name="price">
           
           <button   id="sub" onclick="return validation();" >Submit</button>
      </fieldset>
    </form>
     <?php foreach($total as $i =>$products){?>
     
      <h1 style="margin-left: 500px;margin-bottom: -30px;">Category :<?=$products[0]['cat_name']?></h1> 


    <table >
        <tr>
            <th>S.N.</th>
            <th>Product_Name</th>
            <th>Product_Image</th>
            <th>category Name</th>
             <th>Price</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach($products as $index =>$product){ ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$product['productname']?></td>
            <td><img src="image/<?php echo $product['pro_image'];?>"></td>

            <td><?=$product['cat_name']?></td>
             <td><?=$product['price']?></td>
              
             <td>
                 <a href="http://localhost/ecommerce/product_update.php?productid=<?=$product['productid']?>&cat_id=<?=$product['cat_id']?>"><i class="fas fa-upload"></i></a> 
              </td>
              <td>
                <a href="http://localhost/ecommerce/product_delete.php?productid=<?=$product['productid']?>"><i class="fas fa-envelope-open-text"></i></a>
            </td>
           
        </tr>
        <?php } ?>
    </table>
    <?php } ?>
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
