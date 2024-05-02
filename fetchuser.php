
<?php
  include'fetchuser1.php';
  include "dashboardmain.php";
?>
<!DOCTYPE html>
<html>
  <head>
   <link rel="stylesheet" type="text/css" href="r.css">
   <script src="https://kit.fontawesome.com/0acf56a1e1.js" crossorigin="anonymous"></script>
  </head>
    <style type="text/css">
      table
      {
        margin-left: 290px;
        margin-top: 90px;
        border:1px solid black;

        border-collapse: collapse;
      }
      td,th
      {
         border:1px solid black;
           padding: 10px 15px;

      }
      table a
      {
        color: black;
      }
     
    </style>
  <body>
    <!-- <form method="POST" action="http://localhost/web-technologies/crud/search_student.php">
      <input type="text" placeholder="Enter name of student to search" name="searched_field" required/> 
      &nbsp; <input type="submit" value="Search Student" /> 
    </form> -->
    <!-- <a href="student_form.html" class="move-right"><h3>Add new student</h3></a> -->
    <table >
        <tr>
            <th>S.N.</th>
            <th>Full_Name</th>
            <th>Address</th>
             <th>Phone</th>
            <th>email</th>
            <th>Password</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach($users as $index =>$tb_user){ ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$tb_user['fullname']?></td>
            <td><?=$tb_user['address']?></td>
            <td><?=$tb_user['phone']?></td>
            <td><?=$tb_user['email']?></td>
            <td><?=$tb_user['password']?></td>
            <td>
                <a href="http://localhost/ecommerce/user_update.php?id=<?=$tb_user['id']?>"><i class="fas fa-upload"></i></a>

            </td>
            <td>
                <a href="http://localhost/ecommerce/user_delete.php?id=<?=$tb_user['id']?>"><i class="fas fa-envelope-open-text"></i></a>
            </td>
        </tr>
        <?php } ?>
    </table>
  </body>
</html>
