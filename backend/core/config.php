<?php
    session_start();
    $db ="commerce";
    $conn = mysqli_connect("localhost","root","",$db);

    if($conn->error){
        echo "Something went WRONG!!!";
    }

    require_once "functions.php";
    require_once "fetchProduct.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://kit.fontawesome.com/d991a5e65c.js" crossorigin="anonymous"></script>
    </head>
    <body></body>
</html>