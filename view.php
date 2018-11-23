<?php

$conn = new mysqli("127.0.0.1", "root", "baloney1", "DEV_SA_APPDATA");
$sql = "SELECT id, name, abstract FROM Devices";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) 
{
    echo "ID: " . $row["id"] . " - Name: " . $row["name"]. " - Abstract: " . $row["abstract"]. "<br>";
}
$conn->close();

?>