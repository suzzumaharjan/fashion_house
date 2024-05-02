<?php
    require_once "config.php";
    require_once "carousel(core).php";

        $id = $_POST['id'];
        foreach($carousels as $index => $carousel){
            if($id == $carousel['id']){
                $fileName = $carousels[$index]["name"];
                break;
            }
        }
        print_r($_FILES);          
         $imgPath = "../../images/Carousel/".$fileName;

            if(!unlink($imgPath)){
                echo "Something went Wrong!!!";    
            
            }

        // $countfiles = count($_FILES["image"]['name']);
        // for($k=0;$k<$countfiles;$k++){
            
                $fileName = $_FILES["image"]['name'];
                // Upload file
                // echo $filename."<br>";
                $location = '../../images/Carousel/'.$fileName;
                // echo $location."<br>";
                move_uploaded_file($_FILES['image']['tmp_name'],$location);          
            // }
        $sql = "UPDATE carousel_imgs set Image_Name = \"$fileName\" where img_id = \"$id\"";
        if(mysqli_query($conn,$sql)){
            header("Location:../carousel.php");
            echo $sql;
        }else{
            echo "Something Went Wrong";
            echo $sql;
        }
?>