
<?php
$server = "ftp.aasmnhs.online";
$username = "u488180748_55SMNHS";
$password = "55SMNHSPass";
$dbname = "u488180748_55SMNHS";

// Create connection
try{
   $conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
   die('Unable to connect with the database');
}