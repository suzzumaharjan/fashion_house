 <?php
	
include'heading.php';
	if(isset($_SESSION['user']))
	{
		header('location:http://localhost/ecommerce/index.php');
	}
	if (isset($_SESSION['admin'])) 
	{
			header('location:http://localhost/ecommerce/dashboardhome.php');	}
 	

?> 


<!DOCTYPE html>
<html>
	<head>
		<title>login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css">
		
		
		
		body{
				padding: 0px;
				margin: 0px;
				
				}
			.box{
				width: 400px;
				height: 70%;
				padding: 30px;
				position: absolute;
				top: 60%;
				left:50%;
				text-align: center;
				background-color: black;
				box-shadow: 0px 0px 10px 0px #000;
				border-radius: 44px;
				transform: translate(-50%,-50%);

			}
			.box h1
			{
				color: white;
				text-transform: uppercase;
				font-weight: 100%;
				font-size: 40px;

			}
			.box h3
			{
				color: white;
				opacity: 0.5;

			}
			.box p
			{
				color: white;
				margin-top: 50px;
				font-weight: bold;
				font-family: sans-serif;
				font-size: 20px;
				text-align: left;


			}
			.box input[type="text"],.box input[type="password"]
			{
				display: block;
				margin:20px ;
				text-align: center;
				border: 3px solid #0367fd;
				padding: 14px 20px;
				width: 290px;
				color: white;
			
				background-color: black;
				border-radius: 20px;
				transition: 0.25px;
				outline: none;
				font-size: 20px;

			}
			.box input[type="text"]:hover,.box input[type="password"]:hover
			{
				width: 270px;
				border-color: #ffc400ec; 
			}
			.box input[type="submit"]
			{
				display: block;
				margin:20px auto;
				margin-top: 30px;
				top: 20px;
				text-align: center;
				/*border: 3px solid #ffc400ec ;*/
				padding: 14px 40px;
				background-color: #2E2EFF;
				
				color: white;
				border-radius: 20px;
				transition: 0.25px;
				outline: none;
				cursor: pointer;
				font-size: 25px;
			}
			.box input[type="submit"]:hover
			{
				background-color: #ffc400ec;
			}
			/*.box a
			{
				display: block;
				margin:20px auto;
				text-align: center;
				border: 3px solid #0367fd ;
				padding: 14px 14px;
				width: 160px;
				color: white;
				border-radius: 24px;
				transition: 0.25px;
				outline: none;
				cursor: pointer;
				font-size: 26px;
				text-decoration:none;
				font-weight: 100%;
			}
			.box a:hover
			{
				background-color:#0367fd;
			}*/
			@media only screen and (max-width: 678px)
			{
				
				/*body 
				{
	                background-size: 220%;
            	}*/
            	.box
            	{
            		width: 290px;
            	}
			}
	 		
		</style>

	</head>
	<body>
		<form class="box" method="post" action="http://localhost/ecommerce/logincheck.php" >
			
			<h1>Welcome!!</h1>
			<h3>Please enter your data to continue..</h3>
			<p>Email</p>
			<input type="text" placeholder="suja@gmailcom" name="email">
			<p>Password</p>
			<input type="password" placeholder="password" name="password">
			<input type="submit" value="Log In">
			<hr color="#2f3542" style="height: 0.5%;"/>
		</form>
	</body>
</html>