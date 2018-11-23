<?php

//Recieve from register form
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

//Insert into database
$conn = new mysqli("127.0.0.1", "root", "baloney1", "DEV_SA_APPDATA");
$sql = "INSERT INTO Users (username, email, password) 
VALUES ('$username', '$email', '$password')";
$conn->query($sql);
$conn->close();

//Login status
header('Location: panel.html');

?>