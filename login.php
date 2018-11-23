<?php

//Recieve from login form
$username = $_POST['username'];
$password = $_POST['password'];

//Check with database
$conn = new mysqli("127.0.0.1", "root", "baloney1", "DEV_SA_APPDATA");
$sql = "SELECT username, password FROM Users";
$result = $conn->query($sql);
$fail = true;
while($row = $result->fetch_assoc()) 
{
    if($row["username"] == $username)
        if($row["password"] == $password)
        {
            header('Location: panel.html');
            $fail = false;
        }
}
if($fail)
{
    echo "Login failed! Please try again!\n";
}
$conn->close();

?>