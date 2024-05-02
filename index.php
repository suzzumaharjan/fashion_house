<?php
include'heading.php';



?>
<!DOCTYPE html>
<html>
	<head>
		<?php
		if(isset($_SESSION['message']))
{
	$message=$_SESSION['message'];
	echo"<script>alert(".$message.");</script>";
	// echo $message;
	unset($_SESSION['message']);
}
		?>
		<title></title>
		<link rel="stylesheet" type="text/css" href="indesxstyle.css">
	</head>
	<body>
		<div class="index">
			<div class="col-2">
				<img src="picture.jpg">
			</div>
			
			<div class="col-2">
			<h1>Luxury, For the Woman Who Deserves It..</h1>
			<p>Clothes aren't going to change world</br> the women who wear them will</p>
			<div class="btn"><a href="product_display.php">Explore Now</a></div>
			</div>
			
			<table class="table1" >
				<caption class="content1">Feature Products</caption>
				<tr>
					<th><img src="pant33.jpeg"></th>
					<th><img src="shoes1.jpg"></th>
					<th><img src="shirt3.jfif" ></th>
				</tr>
				<tr>
					<th><img src="shirt1.jfif" ></th>
					<th><img src="kurtha1.jpg" ></th>
				</tr>
			</table>
			
		</div>
		<div class="bottom">
			<div class="down">
					<h1 id="contact">Contact Us</h1>
					<div class="downpart2">
						<div class="down-content">
							<h2><i class="fas fa-map-marker-alt"></i></h2>
							<h2>Address</h2>
				                <span class="down1">Bashundhara,</span>
				                <span class="down1">Kathmandu Nepal</span>
						</div>
			            <div class="down-content">
			                <h2><i class="fas fa-phone"></i></h2>
			                <h2>Phone</h2>
			                <span class="down1">9813528775<br/>9813646613</span>
			            </div>
			            
			            <div class="down-content ">
			                <h2><i class="fas fa-mail-bulk"></i></h2>
			                <h2>Email</h2>
			                <span class="down1">mahrjansuja222@gmail.com<br/>
			                	rasseelamhrzn@gmail.com
			                </span>
			                
			            </div>
						
					</div> 
			</div>
			<?php
			include'footer.php';	
			?>

			
		</div>
		
	</body>
</html>