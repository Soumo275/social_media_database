<!DOCTYPE html>
<html>
<body>

<?php
session_start();

// initializing variables
$name = "";
$email_id    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}



$sql = "SELECT id, name, email_id, img FROM test";
$result = $db->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        print "<br> id: ". $row["id"]. "<br> - Name: ". $row["name"]. "<br> - email_id: " . $row["email_id"] . "<br>";
      print "<img src=\"".$row["img"]."\">";
     
    }
} else {
    print "0 results";
}



$db->close();   
        ?> 



</body>
</html>