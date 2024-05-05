<?php include('insta_server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Instagram Signup</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type='submit']{
      display: block;
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #3897f0;
      color: #fff;
      font-weight: bold;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #3366cc;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Sign Up for Instagram</h1>
    <form method="post" action="insta_register.php">
        <?php include('errors.php'); ?>
      <label for="user">Name:</label>
      <input type="text" id="user" name="user" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email_id" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <input type="submit" class="btn" name="reg_user" placeholder="signup">
    </form>
  </div>
</body>
</html>
