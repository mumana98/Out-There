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

    
    // Escape User Input to help prevent SQL Injection
    // $username = $mysqli->real_escape_string($username);
    // $password = $mysqli->real_escape_string($password);

    $searchTerm = $_GET["searchTerm"];
    $searchTerm = $mysqli->real_escape_string($searchTerm);

    //build query
    if($searchTerm == ""){
        $query = "SELECT * FROM OPPORTUNITIES;";
    }
    else{
        $query = "SELECT * FROM OPPORTUNITIES WHERE TITLE LIKE '%$searchTerm%';";
    }
    //Execute query
    $result = $mysqli->query($query) or die($mysqli->error);
    $num_rows = mysqli_num_rows($result);
    if(mysqli_num_rows($result) == 0){ //user and password does not exist yet
        echo "<h2 style='color:#f00'> $num_rows opportunities found</h2>";
    }
    else{
        echo "<div style='text-align:center'>";
        echo "<h2> $num_rows opportunities found</h2>";
        while ($row = $result->fetch_row()) {

            echo "<div class='center-content-card'>
                    <h2>$row[1]</h2>
                    <table style='text-align: left;'>
                    <tr>
                        <td><strong>Organization:</strong> $row[2]</td>
                        <td class='spacer'></td>
                        <td><strong>Location:</strong> $row[3]</td>
                    </tr>
                    <tr>
                        <td><strong>In-Person:</strong> $row[4]</td>
                        <td class='spacer'></td>
                        <td><strong>Date:</strong> $row[6]</td>
                    </tr>
                    </table>
                    <div class='hr'></div>
                    <p class='description'>$row[5]</p>
                    <a href='$row[7]' class='button'>Volunteer Here</a>
                    <a href='' class='button'>Save</a>
                </div>";

        }
        echo "</div>";
    }

?>