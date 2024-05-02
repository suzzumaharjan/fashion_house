<?php
    //including the configuration file.
    include 'configuration.php';

    // //If something has been posted from the form
    if($_POST){
        // print_r($_POST);
        $cat_name = $_POST['cat_name'];
        $cat_id = $_POST['cat_id'];
        $sql = "UPDATE categories SET cat_name = '$cat_name'  WHERE cat_id = $cat_id";
        if(mysqli_query($conn, $sql)){
            echo "Record updated successfully.";
            mysqli_close($conn);
            header('Location: http://localhost/ecommerce/addcategory.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    if($_GET){
        $cat_id = $_GET['cat_id'];
        $sql = "SELECT * FROM categories WHERE cat_id = $cat_id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $category = array(
                    "cat_id" => $row['cat_id'],
                    "cat_name" => $row['cat_name'],
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
    <form name="meroform" id="myform" method="POST" >
      <fieldset style="width:100px; height: 260px; background-color: beige;">
          <h1>Category form</h1>
            <p>Category_Name:</p>
           <input type="hidden" name="cat_id" value="<?=$category['cat_id']?>" />
            <input
                type="text"
                placeholder="Enter your full name"
                name="cat_name"
                id="cat_name"
                value = "<?=$category['cat_name']?>"
                required
              /><br>
              
              <button   id="sub" onclick="return validation();" >Submit</button>
      </fieldset>
    </form>
  </body>

  <style>
    #myform
    {
     margin-left: 600px;
     margin-top: 100px;
     

    
     
    }
    #myform h1
    {
      text-align: center;
      font-weight: bold;
      font-family: sans-serif;
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
      width: 300px;
      height: 40px;
      margin-top : -140px;
      margin-left:  12px;
      font-size: 20px;
      border: 3px solid black;
      border-radius: 44px;
      text-align: center;
      
      
    }
    input:hover
    {
      border-color: #ffc400ec; 
    }
    #sub
    {
      margin-top: 20px;
      margin-left: 90px;
      width: 140px;
      height: 50px;
      font-weight: bold;
      font-size: 28px;
      color: black;
      border: 3px solid black ;
      border-radius: 40px;
   
    }
    #sub:hover
    {
      background-color: #ffc400ec;
    }
    
  </style>
</html>
