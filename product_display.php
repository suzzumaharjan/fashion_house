<?php
	include'heading.php';
	include'fetch_product.php';
	include 'product_table.php';

	// include './backend/core/fetchProduct.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/23e469355a.js" crossorigin="anonymous"></script>
    <!--<script>
							$(document).ready(function(){
						  $("button").click(function(){
						  	$("p").hide();
						  });
						});
				</script>-->
    <style type="text/css">
		
    .product-note {
        
		margin-left:100px;
            margin-top: 30px;
        display: inline-block;
        justify-content: space-around;
        width: 38%;
    }

    .rows-1 {
        box-shadow: 0px 0px 10px 0px #000;
        padding: 10px 10px;
        width: 80%;
        height: 500px;

    }

    p {
        /*text-decoration: underline;*/
        border-bottom: 4px solid orange;
        width: 30%;
        font-size: 50px;
        font-weight: bolder;
    }

    .cols-1 img {
        box-shadow: 0px 0px 10px 0px #000;
        /*margin: 20px auto;*/
        width: 75%;
        /*border:1px solid black;*/
        margin-left: 30px;
    }

    /*img
			{
				width: 50%;
				hei
			}*/
    .cols-1-img {

        width: 80%;
        /*border: 1px solid black;*/
        height: 350px;
        margin-left: 30px;

    }

    .product-note .product-name {
        font-size: 20px;
        width: 400px;
        text-align: center;

        /*left: 0;*/
        margin-top: 0px;


    }

    .checked {
        color: orange;
    }

    .rows-1 .btn1 {
        padding: 10px 100px;
        /*width:80%; */
        margin-left: 80px;
        margin-right: auto;
        background-color: black;
        color: white;
        font-size: 20px;
        text-decoration: none;

    }

    .rows-1 .btn1:hover {
        cursor: pointer;
        background-color: #ECF0F1;
        color: black;
    }
    </style>
</head>

<body>
    <div class="product-holder">


        <?php foreach ($products as $index => $product) {?>
        <div class="product-note">
            <div class="rows-1">
                <div class="cols-1">
                    <div class="cols-1-img">
                        <img src="image/<?php echo $product['pro_image'];?>">
                    </div>
                    <div class="cols-1-para">
                        <p class="product-name">Name:<?=$product['productname']?><br />
                            <!--Rating:<br/>
		 				<?php
		 				$total_rating=5;
		 				$rate= $product['rating'];
		 				
		 				$j;
		 				
		 				
		 					for($j=$rate; $j<=$total_rating ;$j++)
		 					{

		 						echo"<span class='fa fa-star checked'> </span>";
		 					}
		 					echo "<span class='fa fa-star'></span>";
		 					
		 				?>	 <br/>				
						 <span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span><br/> -->
                            Price: Rs<?=$product['price']?>
                        </p>
                    </div>
                </div>
                <a href="addtocart.php?productid=<?=$product['productid']?>" class="btn1">Add to Cart</a>
            </div>
        </div>

        <?php } ?>
    </div>
</body>

</html>