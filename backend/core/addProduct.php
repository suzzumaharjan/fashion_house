<?php
    require_once "config.php";

    if($_POST){
        $tblname = $_POST['p_name'];
        $p_add = "";
        
        for($j=0;$j<100;$j++){
            if(isset($_POST["input_".$j])){
                $p_add .= $_POST["input_".$j].",";
            }
        }

        $p_add = substr_replace($p_add ,"", -1);
        //first create a product table with all the columns
        $sql = "Insert into products (productName,hiddenName) values ('$tblname','$tblname')";
        
        if(mysqli_query($conn,$sql)){
            $sql = "Create table ".$tblname."(".$tblname."_Id int not null auto_increment,            
                                                ".$tblname."_Image varchar(225),
                                                ".$tblname."_Name varchar(225),
                                                ".$tblname."_Price int,
                                                ".$tblname."_Discount int,
                                                ".$tblname."_Description varchar(225),
                                                ".$tblname."_Status int(1) DEFAULT '1',
                                                PRIMARY KEY(".$tblname."_id)  
                                                )";
            if(mysqli_query($conn,$sql)){
                if($p_add != ""){
                    $additionals = explode(",",$p_add);
                    $sql = "ALTER TABLE ".$tblname." ADD ";
                    foreach($additionals as $index =>$additional){
                        $sql .= $tblname."_".$additional." varchar(225), ADD ";
                    }
                	
                    $sql = substr_replace($sql ,"", -6);
                    if(!mysqli_query($conn,$sql)){
                        echo "something went wrong";
                    }
                }
            //create catagory table of the product
                $cat_tblname = $tblname."_catagories";

                $sql = "Create table ".$cat_tblname."(".$tblname."_catId int not null auto_increment,
                        ".$tblname."_catName varchar(225),
                        ".$tblname."_catStatus int(1) DEFAULT '1',
                        primary key(".$tblname."_catId) 
                        )";
                mysqli_query($conn,$sql);
                // add the catagory_ID in the main product table and set default value
                $sql = "ALTER table ".$tblname." ADD COLUMN ".$tblname."_catagory int(10) DEFAULT '1',ADD FOREIGN KEY (".$tblname."_catagory) REFERENCES "
                        .$tblname."_catagories(".$tblname."_catId)";
                if(mysqli_query($conn,$sql)){
                    $sql = "INSERT into ".$tblname."_catagories (".$tblname."_catName,".$tblname."_catStatus) values (\"Default\",\"0\")" ;
                    mysqli_query($conn,$sql);
                }
                //create a folder to hold the images of said product
                $dir = "../../images/".$tblname;
                if(is_dir($dir) === false ){
                    mkdir($dir);
                    
                    echo "Something Went Wrong!!!";
                
            }
            header("location:../productPage(A).php");
           
        }else{
            echo "Something went wrong";
        }
    }
    }
?>