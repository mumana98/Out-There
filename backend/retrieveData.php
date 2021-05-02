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


    
    // Retrieve data from Query String
    $username = $_GET['username'];
    $password = $_GET['password'];
    
    // Escape User Input to help prevent SQL Injection
    $username = $mysqli->real_escape_string($username);
    $password = $mysqli->real_escape_string($password);

    //build query
    $query = "SELECT * FROM PASSWORDS WHERE username = '$username' AND PASSWORD = '$password'"; //username and password match
    $query2 = "SELECT * FROM PASSWORDS WHERE username = '$username' AND PASSWORD != '$password'"; //only username matches

    //Execute query
    $result = $mysqli->query($query) or die($mysqli->error);
    $result2 = $mysqli->query($query2) or die($mysqli->error);
    
    if(mysqli_num_rows($result) == 0){ //user and password does not exist yet
        if(mysqli_num_rows($result2) > 0){
            $query = "UPDATE PASSWORDS SET PASSWORD = '$password' WHERE USERNAME = '$username';";
    
            $result = $mysqli->query($query);
    
            // Verify the result
            if (!$result) {
                die("Query failed: ($mysqli->error <br>");
            } else {
                echo "Password changed <br> <br>";
            }
        }else{

            //build query
            $query = "INSERT INTO PASSWORDS (USERNAME, PASSWORD) VALUES ('$username', '$password');";

            $result = $mysqli->query($query);

            // Verify the result
            if (!$result) {
                die("Query failed: ($mysqli->error <br>");
            } else {
                echo "New user registered <br> <br>";
            }
        }
    }
    else{
        echo "User and password confirmed";
    }


?>