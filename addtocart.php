<?php
include 'configuration.php';
include 'heading.php';

if(!isset($_SESSION['user']))
{
	header('location:http://localhost/ecommerce/product_display.php');

}
if (!isset($_SESSION['item'])) 
{
	$_SESSION['item']=array();
	$_SESSION['quantity']=array();

	
}
else{
        
        $_SESSION['quantity'] = array_values(array_filter($_SESSION['quantity']));
        $_SESSION['item'] = array_values(array_filter($_SESSION['item']));
    }



if($_GET)
{
	$id=$_GET['productid'];
	// echo $id;
	if(!in_array($_GET['productid'],$_SESSION['item'])) 
	{
		array_push($_SESSION['item'], $id);
		array_push($_SESSION['quantity'],1);
	}
	
	

}

foreach($_SESSION['item'] as $index =>$itemnumber)
{
	$sql="select * from products where productid=".$itemnumber;
	
	$result = mysqli_query($conn, $sql);
  	$row = mysqli_fetch_assoc($result);
  	if (mysqli_num_rows($result) > 0) {
        $products[$index] = array(
           "id" => $row['productid'],
          "productname" => $row['productname'],
          "productimage" => $row['pro_image'], 
          "price"=>$row['price']   
        );       
        // print_r($products);
        
  	} 
}
// $itemnumber=$_SESSION['item'][0];
    // header("location:addtocart.php");


?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script
    src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
  </script>
		<script>
							$(document).ready(function(){
						  $(".quantities").change(function(){
						  	let id =this.id;
						  	let value=$("#"+id).val();
						  	value=parseInt(value);
						  	
						  	let price=$("#originalprice_"+id).text();
						  	price=parseInt(price);

						  	let total_paisa=value*price;
						  	
						  	$('div#totalpaisa_'+id).html(total_paisa);
						  	$.ajax({
           							 url:"updatequantity.php",
           							 method:"POST",
           							 data:{id:id,value:value},
            							dataType:"json"
           						 });
						   grandtotalcalculator();

						  });
						  
						document.load=grandtotalcalculator();
						});
							
							function grandtotalcalculator()
						  {
						  	let grandtotal=0;
						  	 var rowCount = $("#Table_id tr").length;
						  	for(let i=0;i<rowCount-3;i++)
						  	{
						  		let total_paisa=$("#totalpaisa_"+i).text();
						  		grandtotal+=parseInt(total_paisa);

						  		
						  	}
						  
						  	$('div#sabaimoney').html(grandtotal);
						  }
							
				</script>
		<style type="text/css">
			.form_1
			{
				margin-top: 40px;
				padding-left: 40px;
				border: 1px solid black;
				width: 300px;
				display: flex;
			}
			.col_1
			{
				border:1px solid black;
				margin-bottom: 0px;

				/*text-align: center;*/
			}
			p
			{
				margin-bottom: 0px;
				font-size: 20px;
				font-family: sans-serif;
				font-weight: bold;
			}
			 input[type="text"]
			 {
			 	width: 80px;
				font-size: 20px;
				margin:0px;
			 }
			select
			{
				width: 80px;
				font-size: 20px;
			}
			option
			{
				font-size: 20px;
				width:100px;
			}
			h1
			{
				text-align: center;
				margin-top: 60px;
				font-family: sans-serif;
				font-size: 50px;
				font-weight: bold;
			}
			.tbl_1
			{
				margin-top: 30px;
				margin-right: 0px;
				margin-left: 180px;
				
			}
			.tbl_1 img
			{
				
			}
			th
			{
				font-size: 30px;
				background-color: black;
				color:white;
				border-color: white
				padding-right: 10px;
			}
			td
			{
				font-size: 20px;
				font-weight: bold;
				font-family: sans-serif;
				text-align: center;
			}
			table,tr,td,th
			{

				border:1px solid black;
				border-collapse: collapse;
				padding: 10px 30px;
			}
			.tbl_1 a
			{
				text-decoration: none;
				border:1px solid black;
				/*border-width: 100px;*/
				padding: 10px 30px;
				border-radius: 10px;
				color: white;
				background-color: black;
				width: 800px;
				height: 100px;
			}
			.column_1
			{
				display: flex;
			}

			/*I*/
			.btn
			{
				width: 200px;
				font-size: 20px;
				font-family: serif;
				font-weight: bold;
				margin-top: 10px;
				margin-right: 0px;
				margin-left: 0px;
			}
		</style>
	</head>
	<body>
		<div class="tbl_1">
			<h1>Your Orders Detail</h1>
			<table id="Table_id">
		
			
				<tr>
					
					<th>Item_image</th>
					<th>Iitem name</th>
					<th>Iitem quantity</th>
					<th>Iitem price(Rs)</th>
					<th>Total(Rs)</th>
					<th>action</th>
				</tr>
				<?php foreach ($products as $index => $product) 
		{
		 $total=$product['price']?>
				<tr>
					<td><img src="image/<?php echo $product['productimage'];?>"></td>
					<td><p><?=$product['productname']?></p></td>
					<td><input type="text" name="quantity" class="quantities" id="<?=$index?>" value="<?=$_SESSION['quantity'][$index]?>"><br/></td>
					<td ><div id="originalprice_<?=$index?>"><?=$product['price']?> </div></td>

					  <td ><div class ="total_quantity" id="totalpaisa_<?=$index?>"><?=$product['price']?> </div></td> 
					<td><a href="delete.php?id=<?=$index?>" >Remove</a></td>
				</tr>
				
		<?php } ?>
		<tr>
					<td colspan="4" style="text-align: center; font-size: 35px;">Grand Total</td>
					<td colspan="2" class="column_1"><div class="row_1">Rs</div><div id="sabaimoney"> </div ></td>
				</tr>
				<tr>
					<td>
						<a href="setorder.php">Buy Now</a>
					</td>
				</tr>
			</table>
		</div>
		
			
			
			
		

	</body>
</html>