<?php
session_start();

// initializing variables
$user = "";
$email_id    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');

// REGISTER USER
if (isset($_POST['reg_user'])) {


  // receive all input values from the form
  $user = mysqli_real_escape_string($db, $_POST['user']);
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $user_check_query = "SELECT * FROM instagram WHERE user='$user' LIMIT 1"; // Use the new variable here
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user'] === $user) {
      array_push($errors, "user already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	// $password = md5($phno);//encrypt the password before saving in the database

  	$query = "INSERT INTO instagram (user , email_id , password ) 
  			  VALUES('$user', '$email_id', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['user'] = $user;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: profile.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $user = mysqli_real_escape_string($db, $_POST['user']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($user)) {
  	array_push($errors, "user is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	// $password = md5($password);
  	$query = "SELECT * FROM instagram WHERE user='$user' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['user'] = $user;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: profile.php');
  	}else {
  		array_push($errors, "Wrong user/password combination");
  	}
  }
}

?>