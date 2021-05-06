<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "on");
    
    $server = "spring-2021.cs.utexas.edu";
    $user   = "cs329e_bulko_umana";
    $pwd    = "Being&cut\$Gun";
    $dbName = "cs329e_bulko_umana";

    // Connect to MySQL Server
    $mysqli = new mysqli($server, $user, $pwd, $dbName);

    if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
    }
    
    //Select Database
    $mysqli->select_db($dbName) or die($mysqli->error);

    //------------------------------------------------------------------------------------------------------------------------

    $username = $_GET["username"];
    $password = $_GET["password"];

    $username = $mysqli->real_escape_string($username);
    $password = $mysqli->real_escape_string($password);

    //check for already registered users
    $query = "SELECT * FROM USERS WHERE USERNAME = '$username' AND PASSWORD = '$password'"; //find user with exact credentials
    $result = $mysqli->query($query) or die($mysqli->error);
    if(mysqli_num_rows($result) == 0){
        echo "<p style='color:#f00'>Username or password was incorrect</p>";
    } 
    else{
        while ($row = $result->fetch_row()) {
            setcookie('firstname', $row[3], time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie('lastname', $row[4], time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie('email', $row[5], time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie('state', $row[6], time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie('city', $row[7], time() + (10 * 365 * 24 * 60 * 60), '/');
            
            echo "OK";
        }
    }
?>