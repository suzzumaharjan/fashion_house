<div class="form_1">
				<form method="POST" action="addtocart.php?id=<?=$product['id']?>">
					<img src="image/<?php echo $product['productimage'];?>">
					<div class="col_1">
						<p><?=$product['productname']?></p>
					  <p>Rs<?=$product['price']?> </p>
					<input type="hidden" name="prod_name" value="<?=$product['productname']?>">
					<input type="hidden" name="price" value="<?=$product['price']?>">
					<p>Quanyity:</p>
					<input type="number" name="quantity" value="1"><br/>
					<p>Size:</p>
					<select name="size">
						<option value="XL">XL</option>
						<option value="XXL">XXL</option>
					</select><br/>
					<input type="submit" value="Buy Now" class="btn">
					</div>
					
				</form>
				
			</div>
			
			
		
		 <?php } ?>
		  <table >
        <tr>
            <th>S.N.</th>
            <th>Item Name</th>
            <th>Item Price</th>
            <th>Item Quantity</th>
            <th>Item Size</th>
            <th>Total </th>
            <th>Action</th>
        </tr>

       
        <?php
      
         if(!empty($_SESSION['item']))
         {
         	foreach($_SESSION['item'] as $index =>$items){
         		   echo $items['productname'];
         	foreach ($products as $index => $product) {?>
         	<tr>
            <td><?=$product['id']?></td>
            <td><?=$product['productname']?></td>
          
            <td><?=$items['price']?></td>
             <td><?=$items['quantity']?></td>
              <td><?=$items['size']?></td>
              <td><?=number_format($items['price'])?> * <?=$items['quantity']?></td>
            <td>
                <a href="addtocart.php?action=remove&id=<?=$items['id']?>"><i class="fas fa-upload"></i></a>
            </td>
        </tr>
         	 
         	<?php } 
        	

         } 
   }
         	
         ?>







<?php
include 'configuration.php';

include 'heading.php';

if(isset($_POST["add_to_cart"]))
{
 if(isset($_SESSION["shopping_cart"]))
 {
 $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
 if(!in_array($_GET["productid"], $item_array_id))
 {
 $count = count($_SESSION["shopping_cart"]);
 $item_array = array(
 'item_id' => $_GET["productid"],
 'item_name' => $_POST["hidden_name"],
 'item_price' => $_POST["hidden_price"],
 'item_quantity' => $_POST["quantity"],
 'size'=>$_POST['size']
 );
 $_SESSION["shopping_cart"][$count] = $item_array;
 }
 else
 {
 echo '<script>alert("Item Already Added")</script>';
 }
 }
 else
 {
 $item_array = array(
 'item_id' => $_GET["productid"],
 'item_name' => $_POST["hidden_name"],
 'item_price' => $_POST["hidden_price"],
 'item_quantity' => $_POST["quantity"],
 'size'=>$_POST["size"]
 );
 $_SESSION["shopping_cart"][0] = $item_array;
 }
}
 
if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
 {
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
 if($values["item_id"] == $_GET["productid"])
 {
 unset($_SESSION["shopping_cart"][$keys]);
 echo '<script>alert("Item Removed")</script>';
 echo '<script>window.location="index.php"</script>';
 }
 }
 }
}
 
?>
<!DOCTYPE html>
<html>
 <head>
 <title>Shopping Cart In PHP and MySql | Webdevtrick.com</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
 <br />
 <div class="container">
 <br />
 <br />
 <br />
 <h3 align="center">Shoping Cart With PHP And MySql | Source Code By <a href="https://webdevtrick.com">Webdevtrick.com</a></h3><br />
 <br /><br />
 <?php
 $query = "SELECT * FROM products ORDER BY id ASC";
 $result = mysqli_query($conn, $query);
 
 while($row = mysqli_fetch_array($result))
 {
 ?>
 <div class="col-md-4">
 	<?php foreach ($products as $index => $product) {?>
 <form method="post" action="addtocart.php?action=add&id=<?php echo $row["id"]; ?>">
 <div style="border:3px solid #5cb85c; background-color:whitesmoke; border-radius:5px; padding:16px;" align="center">
 	<img src="image/<?php echo $product['productimage'];?>">
 
 <h4 class="text-info"><?php echo $product["productname"]; ?></h4>
 
 <h4 class="text-danger">$ <?php echo $product["price"]; ?></h4>
 
 <input type="text" name="quantity" value="1" class="form-control" />
 <input type="text" name="size" value="XXL" class="form-control" />
 
 <input type="hidden" name="hidden_name" value="<?php echo $product["productname"]; ?>" />
 
 <input type="hidden" name="hidden_price" value="<?php echo $product["price"]; ?>" />
 
 <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
 
 </div>
 </form>
 </div>
 <?php
}
 }
 
 ?>
 <div style="clear:both"></div>
 <br />
 <h3>Order Details</h3>
 <div class="table-responsive">
 <table class="table table-bordered">
 <tr>
 <th width="40%">Item Name</th>
 <th width="10%">Quantity</th>
 <th width="20%">Price</th>
 <th width="15%">Total</th>
 <th width="5%">Action</th>
 </tr>
 <?php
 if(!empty($_SESSION["shopping_cart"]))
 {
 $total = 0;
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
 ?>
 <tr>
 <td><?php echo $values["item_name"]; ?></td>
 <td><?php echo $values["item_quantity"]; ?></td>
 <td>$ <?php echo $values["item_price"]; ?></td>
 <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
 <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
 </tr>
 <?php
 $total = $total + ($values["item_quantity"] * $values["item_price"]);
 }
 ?>
 <tr>
 <td colspan="3" align="right">Total</td>
 <td align="right">$ <?php echo number_format($total, 2); ?></td>
 <td></td>
 </tr>
 <?php
 }
 ?>
 
 </table>
 </div>
 </div>
 </div>
 <br />
 </body>
</html>







<!-- <div class="col-form-1">
		 	<form method="post" >
			 <div style="border:3px solid #5cb85c; background-color:whitesmoke; border-radius:5px; padding:16px;" align="center">
		 	<img src="image/<?php echo $product['pro_image'];?>" class="img-responsive"><br />
		 
		 	<h4 class="text-info"><?php echo $row["productname"]; ?></h4>
		 
		 	<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
		 
		 	<input type="text" name="quantity" value="1" class="form-control" />
		 
		 	<input type="hidden" name="hidden_name" value="<?php echo $row["productname"]; ?>" />
		 
		 	<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
		 
		 	<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
 		
 </div>
 </form>
 </div>

		 -->