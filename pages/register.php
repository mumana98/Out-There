<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register Your Profile</title>
    <link rel="icon" href="../pictures/favicon.ico" />
    <meta name="description"
        content="A page that allows users to leave their e-mail address, name, location and preferred work type, so that they can get e-mail subscriptions" />
    <meta name="author" content="Out There Team" />
    <link rel="stylesheet" href="../styles/search.css" />
    <link rel="stylesheet" href="../styles/register.css" />
</head>

<body>
    <nav class="container-navbar">
        <div class="navbar">
            <a href="../index.html"><img id="nav-logo" src="../pictures/white_out-there_img.png" alt="logo image" /></a>
            <ul>
                <li><a class="nav-link" href="../index.html">Home</a></li>
                <li><a class="nav-link" href="./search.html">Search</a></li>
                <li><a class="nav-link" href="./about.html">About</a></li>
                <li><a class="nav-link" href="./contact.html">Contact Us</a></li>
            </ul>
        </div>
    </nav>

    <script language = "javascript" type = "text/javascript">

        function ajaxFunction(){
           var ajaxRequest;  // The variable that makes Ajax possible!
           
           ajaxRequest = new XMLHttpRequest();
           
           // Create a function that will receive data sent from the server and will update
           // the div section in the same page.
                
           ajaxRequest.onreadystatechange = function(){
              if(ajaxRequest.readyState == 4){
                 var ajaxDisplay = document.getElementById('ajaxDiv');
                 ajaxDisplay.innerHTML = ajaxRequest.responseText;
              }
           }
           
           // Now get the value from user and pass it to server script.
                
           var username = document.getElementById('username').value;
           var password = document.getElementById('password').value;
           var firstname = document.getElementById('firstname').value;
           var lastname = document.getElementById('lastname').value;
           var email = document.getElementById('email').value;
           var state = document.getElementById('state').value;
           var city = document.getElementById('city').value;
           var queryString = "?username=" + username;
        
           queryString +=  "&password=" + password;
           
           ajaxRequest.open("GET", "register.php" + queryString, true);
           ajaxRequest.send(null);
        }

  </script>
    <div id="content">
        <div id="main-content">
            <div class="container-body">
                <form class="form-body" id="form" action="../backend/register.php" method="POST">
                    <br>
                    <br>
                    <br>
                    <h1 style="text-align: center">Register</h1>
                    <br>
                    <h3 style="text-align: center">
                        Register your profile here in order to receive e-mail newsletters and
                        work recommendations that suits your preferences from us!
                    </h3>
                    <br>
                    <br>
                    <br>
                    <br>
                    <label for="firstname">First name:</label>
                    <br>
                    <input type="text" id="firstname" name="fname"><br><br>

                    <label for="lname">Last name:</label>
                    <br>
                    <input type="text" id="lastname" name="lname"><br><br>

                    <label for="email">Email:</label>
                    <br>
                    <input type="text" id="email" name="email"><br><br>

                    <label for="username">Username:</label>
                    <br>
                    <input type="password" id="username" name="un" required><br><br>

                    <label for="password">Password:</label>
                    <br>
                    <input type="password" id="password" name="pw" required><br><br>

                    <label for="password">Re-type Password:</label>
                    <br>
                    <input type="password" id="password" name="rpw" required><br><br>

                    <label for="state">State:</label>
                    <br>
                    <input type="text" id="state" name="state"><br><br>

                    <label for="city">City:</label>
                    <br>
                    <input type="text" id="city" name="city"><br><br>

                    <input id="submit" type="submit" name="Submit" />
                    <br>
                    <a href="./login.html">Login</a>
                    <br>
                    <br>
                    <br>
                </form>
            </div>

    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", "on");


        $username = document.getElementById("username").value;
        $password = document.getElementById("password").value;
        $firstname = document.getElementById("firstname").value;
        $lastname = document.getElementById("lastname").value;
        $email = document.getElementById("email").value;
        $state = document.getElementById("state").value;
        $city = document.getElementById("city").value;
        $queryString = "?username=" + username;
        $USERNAME = $_POST["username"];
        $PASSWORD = $_POST["password"];
        $FIRSTNAME = $_POST["firstname"];
        $LASTNAME = $_POST["lastname"];
        $EMAIL = $_POST["email"];
        $STATE = $_POST["state"];
        $CITY = $_POST["city"];
        $server = "spring-2021.cs.utexas.edu";
        $user   = "cs329e_bulko_umana";
        $pwd    = "Being&cut\$Gun";
        $dbName = "cs329e_bulko_umana";
      
        //create sql table
        if ($USERNAME != '' || $password != '') {
            $mysqli = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
        }
        //Select database
        $mysqli->select_db($dbname) or die($mysqli->error);
    
        // Escape User Input to help prevent SQL Injection
        $USERNAME = $mysqli->real_escape_string($USERNAME);
        $PASSWORD = $mysqli->real_escape_string($PASSWORD);
        $FIRSTNAME = $mysqli->real_escape_string($FIRSTNAME);
        $LASTNAME = $mysqli->real_escape_string($LASTNAME);
        $EMAIL = $mysqli->real_escape_string($EMAIL);
        $STATE = $mysqli->real_escape_string($STATE);
        $CITY = $mysqli->real_escape_string($CITY);
    
        //create sql table
        if ($username != '' || $password != '') {
            $mysqli = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
        }
        //Select database
        $mysqli->select_db($dbname) or die($mysqli->error);

        // Escape User Input to help prevent SQL Injection
        $USERNAME = $mysqli->real_escape_string($USERNAME);
        $PASSWORD = $mysqli->real_escape_string($USERNAME);

        //build query
        $query = "SELECT username, password FROM USERS WHERE username = '$USERNAME' AND password = '$PASSWORD'";
        $result = $mysqli->query($query) or die($mysqli->error);

        if ($result->fetch_array(MYSQLI_ASSOC)) {
            echo 'alert("User already exists! Please login.")';
        } 
        else {
        //Build and execute query
        $query = "SELECT username FROM USERS WHERE username = '$USERNAME'";
        $result = $mysqli->query($query) or die($mysqli->error);
        if ($result->fetch_array(MYSQLI_ASSOC)) {
            $query = "UPDATE USERS SET password = '$PASSWORD' WHERE username = '$USERNAME'";
            $result = $mysqli->query($query) or die($mysqli->error);
            echo 'alert("Password changed. Please login.")';
        } 
        else {
        // build and execute query
            $query = "INSERT INTO USERS (username, password) VALUES('$USERNAME', '$PASSWORD')";
            $result = $mysqli->query($query) or die($mysqli->error);
            echo 'alert("New user registered. Please login.")';
        }
    }
    ?>

        </div>
            <div id="footer">
                <div id="footertext">
                    <img id="footer-logo" src="../pictures/white_out-there_img.png" alt="logo image">
                    <p>
                        <a href="./about.html">About</a>
                    </p>
                    <p>
                        <a href="./search.html">Search</a>
                    </p>
                    <p>
                        <a href="./contact.html">Contact Us</a>
                    </p>
                    <p class="center"><a href="mailto:msu245@utexas.edu">&#169; Out There 04/05/2021</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="../js/validateProfileSubmission.js"></script> -->
</body>

</html>
