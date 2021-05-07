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
    $firstname = $_GET["firstname"];
    $lastname = $_GET["lastname"];
    $email = $_GET["email"];
    $city = $_GET["city"];
    $state = $_GET["state"];

    $username = $mysqli->real_escape_string($username);
    $password = $mysqli->real_escape_string($password);
    $firstname = $mysqli->real_escape_string($firstname);
    $lastname = $mysqli->real_escape_string($lastname);
    $email = $mysqli->real_escape_string($email);
    $city = $mysqli->real_escape_string($city);
    $state = $mysqli->real_escape_string($state);

    //check for already registered users
    $query = "SELECT * FROM USERS WHERE USERNAME = '$username' OR EMAIL = '$email'"; //username or email already exists
    $result = $mysqli->query($query) or die($mysqli->error);
    if(mysqli_num_rows($result) > 0){
        echo "<p style='color:#f00'>Username or Email already registered</p>";
    } 
    else{
        //insert user
        $query = "INSERT INTO USERS (USERNAME, PASSWORD, FIRSTNAME, LASTNAME, EMAIL, STATE, CITY)
                    VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$city', '$state');";

        $result = $mysqli->query($query);
            
        // Verify the result
        if (!$result) {
            die("Query failed: ($mysqli->error <br>");
        } else {
            //echo "You are now registered";
            session_start();

            setcookie('firstname', $firstname, time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie('lastname', $lastname, time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie('email', $email, time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie('city', $city, time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie('state', $state, time() + (10 * 365 * 24 * 60 * 60), '/');
            $_SESSION["loggedIn"] = true;
            echo "OK";

        }
    }

?>