<?php
//include auth.php file on all secure pages
include("authorize.php");
?>
<html>
<head>
    <title>Log in to your account</title>
    <link rel="stylesheet"	type="text/css" href="style.css"/>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<div class="toptext">
    <p>Boise Concerts and Events</p>
</div>

<ul class="topnav">
    <li><a href="index.php"><img src="logo.png" alt="Logo" style="width:50px;height:50px;"></a></li>
    <li><a href="index.php">Home</a></li>
    <li><a href="about.html">About</a></li>
    <li><a class="active" href="login.php">Log In</a></li>
</ul>


<p>Welcome <?php echo $_SESSION['username']; ?>!</p>

<a href="logout.php">Logout</a>

<ul class="footer">
    <li><a class="active" href="index.php">Home</a></li>
    <li><a href="about.html">About</a></li>
    <li><a href="login.php">Log In</a></li>
    <li><a href="contact.html">Contact Us</a></li>
</ul>

</body>
</html>