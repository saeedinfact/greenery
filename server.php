<?php

//Setting
$host = "192.168.43.99";
$port = 2688;
set_time_limit(0);

//Create and connect
echo "Trying to connect to " . $host . ":" . $port . "\n";
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_connect($socket, $host, $port) or die("Could not connect to client\n");
echo "Connection successfull!\n";

//Write and read
$ack = "@ack\r\n";
echo "Trying to send " . $ack . " to client\n";
socket_write($socket, $ack, strlen($ack)) or die("Could not send data to client\n");

//Communication
//for ($x = 1; $x <= 60; $x++) 
while(true)
{
    echo "Waiting for client respone...\n";
    $result = socket_read ($socket, 2048) or die("Could not read client response\n");
    echo "Reply From Client: " . $result;
    echo "\n";
    sscanf($result, "I:%d, L:%d, H1:%d, H2:%d, H3:%d, H4:%d, H5:%d, H:%d, T:%d, V:%d",
                    $id, $lux, $hum1, $hum2, $hum3, $hum4, $hum5, $hum, $temp, $vol); 
    $date = date("Y/m/d");
    $time = date("h:i:sa");

    //Insert into database
    $conn = new mysqli("127.0.0.1", "root", "baloney1", "DEV_SA_APPDATA");
    $sql = "INSERT INTO Information (id, date, time, lux, hum1, hum2, hum3, hum4, hum5, hum, temp, vol)
    VALUES ('$id', '$date', '$time', '$lux', '$hum1', '$hum2', '$hum3', '$hum4', '$hum5', '$hum', '$temp', '$vol')";
    $conn->query($sql);
    $conn->close();

    //Tempreture
    if($temp > 25)
    {   
        $msg = "@fanOn\r\n";
        socket_write($socket, $msg, strlen($msg)) or die("Could not send data to client\n");
    }
    else if ($temp < 23)
    {
        $msg = "@fanOff\r\n";
        socket_write($socket, $msg, strlen($msg)) or die("Could not send data to client\n");
    }

    //Illumination
    if($lux > 100)
    {   
        $msg = "@lampOff\r\n";
        socket_write($socket, $msg, strlen($msg)) or die("Could not send data to client\n");
    }
    else if ($lux < 20)
    {
        $msg = "@lampOn\r\n";
        socket_write($socket, $msg, strlen($msg)) or die("Could not send data to client\n");
    }

    sleep(1);
    socket_write($socket, $ack, strlen($ack)) or die("Could not send data to client\n");
    echo "Acknowledgement is sent\n";
    sleep(0.5);
}
?>