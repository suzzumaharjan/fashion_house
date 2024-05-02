<?php
  include "configuration.php";
  include "dashboardmain.php";

  $sql = "SELECT * FROM admins";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
      $i = 0;
      while($row = mysqli_fetch_assoc($result)) {
        $admins[$i] = array(
          "id" => $row['id'],
          "fullname"=>$row['fullname'],
          "password"=>$row['password'],
        );
        $i++;
      }
  }




  if($_POST)
  {
     $fullname = $_POST['fullname'];
     $password = $_POST['password'];
     $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encryption_iv = '1234567891011121';
        $encryption_key = "a44afb0b6808d662";

        $encryptedpswd = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);

     $sql="insert into admins (fullname,password)values('$fullname','$encryptedpswd')";
     if (mysqli_query($conn,$sql))
     {
       header('Location: http://localhost/ecommerce/adminfetch.php');
       }

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
          
            var full_name=document.forms['meroform']['fullname'];
            if(full_name.value=="")
            {
              alert('enter the fullname');
              full_name.focus();
              return false;
            }
            elseif(password.value=="")
            {
              alert('enter the password');
              password.focus();
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
    <form  name="meroform" id="myform" method="POST" action="adminfetch.php">
      <fieldset style="width:300px; height: 300px; background-color: beige;">
         <h1>Admin form</h1>
            <p>Admin_Name:</p>
           <input type="text" name="fullname"><br>
           <p>Password:</p>
           <input type="password" name="password"><br>
           <button   id="sub" onclick="return validation();" >Submit</button>
        
      </fieldset>
     
    </form>
    
    <table >
        <tr>
            <th>S.N.</th>
            <th>Full_Name</th>
            <th>Password</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach($admins as $index =>$admin){ ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$admin['fullname']?></td>
            <td><?=$admin['password']?></td>
            <td>
                <a href="http://localhost/ecommerce/admin_update.php?id=<?=$admin['id']?>"><i class="fas fa-upload"></i></a>
            </td>
            <td>
                <a href="http://localhost/ecommerce/admin_delete.php?id=<?=$admin['id']?>"><i class="fas fa-envelope-open-text"></i></a>
            </td>
        </tr>
        <?php } ?>
    </table>
  </body>
  <style type="text/css">
    
    #myform
    {
     margin-left:640px;
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
      font-size: 20px;
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
      font-size: 16px;
      border: 1px solid black;
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
      font-size: 20px;
      color: black;
      border: 1px solid black ;
      border-radius: 40px;
   
    } #sub:hover { background-color: #ffc400ec; } 
     table
    {
      margin-top: 60px;
    }
    table  a
       {
        color: black;
       }
  </style>
</html>
