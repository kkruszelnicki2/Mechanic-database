<?php

function OpenCon()
{
$dbhost = "localhost";
$dbuser = "kkruszelnicki";
$dbpass = "Chohyaish6yo";
$db = "kkruszelnicki_projekt";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or
             die("Connect failed: %s\n". $conn->error);
return $conn;
}

function CloseCon($conn)
{
$conn -> close();
}

?>