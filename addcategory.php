

<?php
  include "configuration.php";
  include "dashboardmain.php"; 
  include "fetch_category.php";
  

   if($_POST)
  {
     $cat_name = $_POST['cat_name'];

     $sql="insert into categories (cat_name)values('$cat_name')";
     if (mysqli_query($conn,$sql))
     {
       header('Location: http://localhost/ecommerce/addcategory.php');
       }

  }
  
  
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="r.css">
    <script src="https://kit.fontawesome.com/0acf56a1e1.js" crossorigin="anonymous"></script>
      <script>
         function validation()
         {
          
            var name=document.forms['meroform']['cat_name'];
            if(name.value=="")
            {
              alert('enter the category name');
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
    <form  name="meroform" id="myform" method="POST" action="addcategory.php">
      <fieldset style="width:100px; height: 240px; background-color: beige;">
         <h1>category form</h1>
            <p>Category_Name:</p>
           <input type="text" name="cat_name"><br>
           <button   id="sub" onclick="return validation();" >Submit</button>
        
      </fieldset>
     
    </form>
    
    
    <table >
      <caption>Categories</caption>
        <tr>
            <th>S.N.</th>
            <th>Category_Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach($categories as $index =>$category){ ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$category['cat_name']?></td>
             <td>
                <a href="http://localhost/ecommerce/category_update.php?cat_id=<?=$category['cat_id']?>"><i class="fas fa-upload"></i></a>
              </td>
              <td>
                <a href="http://localhost/ecommerce/category_delete.php?cat_id=<?=$category['cat_id']?>"><i class="fas fa-envelope-open-text"></i></a>
            </td>
           
        </tr>
        <?php } ?>
    </table>
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
     
    
    }
   input 
    {
      width: 260px;
      height: 40px;
      margin-top : -140px;
      margin-left:  20px;
      font-size: 20px;
      border: 3px solid black;
      border-radius: 44px;
      
      
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
   
    } #sub:hover { background-color: #ffc400ec; } 
    table 
      { 
        margin-top: 60px;
       }
       caption
       {
        font-weight: bold;
        font-size: 40px;
        text-align: left;
        margin-bottom: 20px;
       }
       table  a
       {
        color: black;
       }

    
    
  </style>

</html>
