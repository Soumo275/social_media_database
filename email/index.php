<?php 
  session_start(); 

  if (!isset($_SESSION['name'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['name']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
	#insta{
		height:50px;
		width: 80px;
		background-color:tomato;
	}
	#tweet{
		height:50px;
		width: 80px;
		background-color:lightblue;
	}
	p{
		text-align: center;
		font-size: 25px;
	}
	button{
		font-size: 15px;
		border-radius:30%;
	}
		</style>
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['name'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['name']; ?></strong></p>
		<p><button id='insta' ><a href="../instagram/insta_login.php" >Instagram</a></button>
		<button id='tweet'><a href='../twitter/twitter_login.php'>Twitter</a></button></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>