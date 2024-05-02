<?php

   



      function get_column_names($conn, $table) {
        $sql = 'DESCRIBE '.$table;
        $result = mysqli_query($conn, $sql);
      
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
          $rows[] = $row['Field'];
        }
      
        return $rows;
      }

      function check_tbl_exists($conn,$table){
        $sql = "SELECT * from ".$table;
      
        if(mysqli_query($conn,$sql)){
          return true;
        }else{
          return false;
        }
      }

      function delete_directory($dirname) {
        if (is_dir($dirname)){
          rmdir($dirname);   
        }
         return true;
      }
    ?>
