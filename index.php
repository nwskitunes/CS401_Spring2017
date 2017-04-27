<?php session_start(); ?>
<?php require_once("dao.php"); ?>
<?php
$request_url = "http://api.songkick.com/api/3.0/metro_areas/24581/calendar.xml?apikey=FEeTWXeV0R1mAJUa";
$xml = simplexml_load_file($request_url) or die("load error on url or api key");
$skdate = array();
$venue = array();
$date = array();
$event = array();
$artist = array();
$sktime = array();
$time = array();

foreach ($xml->results->event as $event) {
    $skdate[] = (string)$event->start["date"];
    $date[] = date("m/d", strtotime($skdate));
    $venue[] = (string)$event->venue["displayName"];
    $artist[] = (string)$event->performance->artist["displayName"];
    $sktime[] = (string)$event->start["time"];
    $time[] = date("g:i a", strtotime($sktime));
}

$uniqueVenue[] = array_unique($venue, SORT_STRING);

?>

<html>
<head>
    <title>Home of Boise Concerts and Events</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<div class="wrapper">
        <div class="toptext">
            <p>Boise Concerts and Events</p>
        </div>

        <ul class="topnav">
            <li><a href="index.php"><img src="logo.png" alt="Logo" style="width:50px;height:50px;"></a></li>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="login.php">Log In</a></li>
        </ul>
    <div class="content">
            <div class="leftMenuHome">
                <h2>Venues:</h2>
                <form action="" method="post">
                    <table>
                        <tbody>
                        <?php
                        $formVenue = array();
                        for ($i = 0; $i < count($artist); $i++) {
                            if ($uniqueVenue[0][$i] != null) {
                                echo "
                        <tr>
                    <td>";
                                echo $uniqueVenue[0][$i];
                                echo "<input type=\"checkbox\" name= $uniqueVenue[0][$i] value=$uniqueVenue[0][$i]/>";
                                echo " </td>
                        </tr>";
                            }
                        }
                        echo "    <tr>
                    <td><input type=\"submit\" name=\"formSubmit\" value=\"Submit\" /></td>
                        </tr>
            </tbody>
            </table>
        </form>
    </div>
    <div class=\"rightContentHome\">
        <h1>Upcoming Events</h1>
        <table>
            <thead>
            <tr>
                <th>Date</th>
                <th>Artist</th>
                <th>Venue</th>
                <th>Time</th>
            </tr>
            </thead>
            <tbody>";
                        if (isset($_POST['formSubmit'])) {
                            for ($j = 0; $j < count($uniqueVenue[0]); $j++) {
                                for ($i = 0; $i < count($artist); $i++) {
                                    if ($uniqueVenue[0][$j] == $venue[$i]) {
                                        echo "<tr>";
                                        echo "<td> $date[$i] </td>";
                                        echo "<td> $artist[$i] </td>";
                                        echo "<td> $venue[$i] </td>";
                                        echo "<td> $time[$i] </td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                        } else {
                            for ($i = 0; $i < count($artist); $i++) {
                                echo "<tr>";
                                echo "<td> $date[$i] </td>";
                                echo "<td> $artist[$i] </td>";
                                echo "<td> $venue[$i] </td>";
                                echo "<td> $time[$i] </td>";
                                echo "</tr>";
                            }
                        }

                        echo " </tbody>
        </table>";
                        ?>
            </div>

    </div>
    <div class="footer">
        <ul class="footer">
            <li><a class="active" href="index.php">Home</a></li>
            <li><img src="powered-by-songkick-black.png" alt="Powered by Songkick" style="width:212px;height:75px;">
            </li>
            <li><a href="about.html">About</a></li>
            <li><a href="login.php">Log In</a></li>
            <li><a href="contact.html">Contact Us</a></li>
        </ul>
    </div>
</div>

</body>
</html>
