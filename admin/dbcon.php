<?php
$conn = mysqli_connect('ftp.aasmnhs.online','u488180748_55SMNHS','55SMNHSPass','u488180748_55SMNHS') or die(mysqli_error());

if (!$conn)
{
    die("Connection failed: ". mysqli_connect_error());
}

?>