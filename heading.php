<?php
include'configuration.php';

session_start();
if (isset($_SESSION['user']) &&  $_SESSION['user']=true) 
{
	$id = $_SESSION['user'];
	$sql = "Select * from users where email='$id'";
	$result = mysqli_query($conn, $sql);
  	$row = mysqli_fetch_assoc($result);
  	if (mysqli_num_rows($result) > 0) {
        $users = array(
           "id" => $row['id'],
          "first_name" => $row['fullname'],
          "email" => $row['email'],    
        );
       $_SESSION['name'] = $users['first_name'];
       
  	} 


	$view1='block';
	$view2='none';

}
else
{
	$view2='block';
	$view1='none';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="headingstyle.css">
	 <script src="https://kit.fontawesome.com/0acf56a1e1.js" crossorigin="anonymous"></script>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->

	
	
</head>
<body>
	<nav class="navbar">
			<div class="brand-title">Fashion House</div> 
			<div class="navbar-links">
				<ul>
					<li><a href="index.php">Home</a></li>
							
					<li><a href="product_display.php">Products</a></li>
					
					<li><a href="index.php#contact">Contact</a></li>
					<li><a href="addtocart.php"><i class="fas fa-cart-plus"></i></a></li>
						
					
						<div class="dropdown">
							<button class="dropbtn"><i class="fas fa-user-circle"></i> <i class="fas fa-caret-down"></i>
							</button>
							<div class="dropdown-content">
								<a href="login.php" style=

									"display: <?=$view2?>;" >Log In</a>
								<a href="signup.php" style=

									"display: <?=$view2?>;">SignUp</a>
								<a  href="logout.php" style=

									"display: <?=$view1?>;">Log OuT</a>
								
							</div>
							<li style="display: <?=$view1?>;">Welcome <?php echo $_SESSION['fullname'];?> </li>
						
						</div>
				</ul>
			</div>
		</nav>
<style type="text/css">
	.show
	{
		display:block;
	}

	.hide
	{
		display: none;
	}
</style>
</body>

</html>