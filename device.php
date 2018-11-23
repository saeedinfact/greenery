<?php

//Recieve from register form
$id = $_POST['id'];
$name = $_POST['name'];
$abstract = $_POST['abstract'];

//Insert into database
$conn = new mysqli("127.0.0.1", "root", "baloney1", "DEV_SA_APPDATA");
$sql = "INSERT INTO Devices (id, name, abstract) 
VALUES ('$id', '$name', '$abstract')";
$conn->query($sql);
$conn->close();

//Login status
header('Location: panel.html');

?>