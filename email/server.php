<?php
session_start();

// initializing variables
$name = "";
$email_id    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $phno = mysqli_real_escape_string($db, $_POST['phno']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "name is required"); }
  if (empty($email_id)) { array_push($errors, "email_id is required"); }
  if (empty($phno)) { array_push($errors, "Phone is required"); }
 

  // first check the database to make sure 
  // a user does not already exist with the same name and/or email_id
  $user_check_query = "SELECT * FROM email WHERE name='$name' OR email_id='$email_id' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['name'] === $name) {
      array_push($errors, "name already exists");
    }

    if ($user['email_id'] === $email_id) {
      array_push($errors, "email_id already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  
  	$query = "INSERT INTO email (name, email_id,phno, password) 
  			  VALUES('$name', '$email_id', '$phno','$password')";
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($name)) {
  	array_push($errors, "name is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	// $password = md5($password);
  	$query = "SELECT * FROM email WHERE name='$name' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['name'] = $name;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong name/password combination");
  	}
  }
}

?>