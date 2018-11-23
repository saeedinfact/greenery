<?php

$conn = new mysqli("127.0.0.1", "root", "baloney1", "DEV_SA_APPDATA");
$sql = "SELECT id, date, time, lux, hum1, hum2, hum3, hum4, hum5, hum, temp, vol FROM Information";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) 
{
    echo "ID: " . $row["id"] . " - Date: " . $row["date"] . " - Time: " . $row["time"] . " - Lux: " . $row["lux"] . 
        " - Hum1: " . $row["hum1"] . " - Hum2: " . $row["hum2"] . " - Hum3: " . $row["hum3"] . " - Hum4: " . $row["hum4"] .
        " - Hum5: " . $row["hum5"] . " - Hum: " . $row["hum"] .  " - Temp: " . $row["temp"] . " - Vol: " . $row["vol"] . "<br>";
}
$conn->close();

?>