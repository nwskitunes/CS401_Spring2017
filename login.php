<?php
$message = "";
$username = "";
?>
<html>
<head>
    <title>Log in to your account</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
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

<?php
require('dao.php');
session_start();
$message = "";

// If form submitted, insert values into the database.
if (isset($_POST['username'])) {

    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    if(!filter_var($username, FILTER_VALIDATE_EMAIL)){
        $message = "Incorrect email format: ";
    }

    $query = "SELECT * FROM `users` WHERE email='$username' and password='$password'";
    $result = $conn->query($query) or die("from result<br>" . "Database connection error: -> " . mysqli_error($conn));
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $_SESSION['username'] = $username;
        echo "SUCCESS!!!!";
        // Redirect user to index.php
        header('Location: http://glacial-taiga-92057.herokuapp.com/welcome.php');
    } else {

        $message .= "Invalid username or password, please try again";
        $username = stripslashes($_REQUEST['username']);
        echo "
            <form action=\"\" method=\"post\" name=\"login\">

            <table>
            <tr><td colspan=2><h1>Login</h1></td></tr>
            <tr><td>Username:</td><td>
                <input type=\"text\" name=\"username\" placeholder=\"Username\" value = $username required />
            </td></tr>

            <tr><td>Password:</td><td>
                <input type=\"password\" name=\"password\" placeholder=\"Password\" required />
            </td></tr>

            <tr><td colspan=\"2\" align=\"right\">
            <input name=\"submit\" type=\"submit\" value=\"submit\">
            </td></tr>
            <tr><td colspan=\"2\" align=\"right\">
                <p>$message</p>
            </td></tr>
            </table>
            </form>";
    }

} else {
    ?>
    <form action="" method="post" name="login">

        <table>
            <tr>
                <td colspan=2><h1>Login</h1></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" placeholder="Username" required
                           value="<?php echo "$username" ?>"/>
                    <!--    <input type="text" name="username" value="--><!--">-->
                </td>
            </tr>

            <tr>
                <td>Password:</td>
                <td>
                    <!--    <input type="password" name="password" maxlength="60" value="">-->
                    <input type="password" name="password" placeholder="Password" required/>
                </td>
            </tr>

            <tr>
                <td colspan="2" align="right">
                    <input name="submit" type="submit" value="submit">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <p><?php echo $message ?></p>
                </td>
            </tr>

        </table>
    </form>
<?php } ?>

<ul class="footer">
    <li><a class="active" href="index.php">Home</a></li>
    <li><a href="about.html">About</a></li>
    <li><a href="login.php">Log In</a></li>
    <li><a href="contact.html">Contact Us</a></li>
</ul>
</body>
</html>



