<?php
session_start();
// Destroying All Sessions
if(session_destroy())
{
// Redirecting To Home Page
    header("Location: http://glacial-taiga-92057.herokuapp.com/login.php");
}
?>