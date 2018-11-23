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
sleep(0.5);
$msg = "@pompOn:1\r\n";
socket_write($socket, $msg, strlen($msg)) or die("Could not send data to client\n");
sleep(2);
$msg = "@pompOff:1\r\n";
socket_write($socket, $msg, strlen($msg)) or die("Could not send data to client\n");

$msg = "@pompOn:2\r\n";
socket_write($socket, $msg, strlen($msg)) or die("Could not send data to client\n");
sleep(2);
$msg = "@pompOff:2\r\n";
socket_write($socket, $msg, strlen($msg)) or die("Could not send data to client\n");
sleep(2);

$msg = "@pompOn:4\r\n";
socket_write($socket, $msg, strlen($msg)) or die("Could not send data to client\n");
sleep(2);
$msg = "@pompOff:4\r\n";
socket_write($socket, $msg, strlen($msg)) or die("Could not send data to client\n");
sleep(2);

$msg = "@pompOn:5\r\n";
socket_write($socket, $msg, strlen($msg)) or die("Could not send data to client\n");
sleep(2);
$msg = "@pompOff:5\r\n";
socket_write($socket, $msg, strlen($msg)) or die("Could not send data to client\n");
sleep(2);
?>