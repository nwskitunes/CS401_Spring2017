<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$user = $url["user"];
$pass = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $user, $pass, $db);

if($conn->connect_errno){
    echo"from dao.php";
    die("Database connection error: -> ".$conn->connect_error);
}


