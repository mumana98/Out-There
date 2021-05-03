<?php

    echo "This is PHP!";

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
    } else {
        echo "Connection Success!";
    }
    
    //Select Database
    $mysqli->select_db($dbName) or die($mysqli->error);

    
    // Escape User Input to help prevent SQL Injection
    // $username = $mysqli->real_escape_string($username);
    // $password = $mysqli->real_escape_string($password);

    //build query
    $query = "SELECT * FROM OPPORTUNITIES";

    //Execute query
    $result = $mysqli->query($query) or die($mysqli->error);
    
    if(mysqli_num_rows($result) == 0){ //user and password does not exist yet
        echo "<p style='color:#f00'>No opportunities found!</p>";
    }
    else{
        echo "<table border='2'>
        <tr>
            <th>TITLE</th>
            <th>ORGANIZATION</th>
            <th>LOCATION</th>
            <th>INPERSON</th>
            <th>DESCRIPTION</th>
            <th>DATE</th>
            <th>LINK</th>
        </tr>";
        while ($row = $result->fetch_row()) {
            echo "<tr>  
                    <td>$row[1]</td> 
                    <td>$row[2]</td>
                    <td>$row[3]</td> 
                    <td>$row[4]</td>  
                    <td>$row[5]</td>
                    <td>$row[6]</td> 
                    <td>$row[7]</td>  
                </tr>";
        }
        echo "</table> <br><br><br>";
    }


?>