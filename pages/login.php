<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Out There - Home</title>
    <link rel="icon" href="../pictures/favicon.ico" />
    <meta name="description" content="Out There Site" />
    <meta name="author" content="Out There Team" />
    <link rel="stylesheet" href="../styles/home.css" />
    <link rel="stylesheet" href="../styles/login.css" />
  </head>
  <body>
    <nav class="container-navbar">
      <div class="navbar">
        <a href="../index.html"
          ><img
            id="nav-logo"
            src="../pictures/white_out-there_img.png"
            alt="logo image"
        /></a>
        <ul>
          <li><a class="nav-link" href="../index.html">Home</a></li>
          <li><a class="nav-link" href="./search.html">Search</a></li>
          <li><a class="nav-link" href="./about.html">About</a></li>
          <li><a class="nav-link" href="./contact.html">Contact Us</a></li>
        </ul>
        <!-- <a id="login" class="nav-link" href="">Login</a> -->
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
           var queryString = "?username=" + username;
        
           queryString +=  "&password=" + password;
           
           ajaxRequest.open("GET", "login.php" + queryString, true);
           ajaxRequest.send(null);
        }

  </script>
    


    <div id="content">
      <div id="main-content">
        <div id="container">
          <form
            class="form-body"
            id="form"
            action="../backend/login.php"
            method="POST">
            <br><br>
            <h1>Login</h1>
            <br />
            <br />
            <br />
            <label for="un">Username:</label>
            <br />
            <input type="text" id="un" name="un" />
            <br />
            <br />
            <label for="pw">Password:</label>
            <br />
            <input type="password" id="pw" name="pw" />
            <br />
            <br />
            <input type="submit" value="Login" />
            <br />
            <a href="./register.html">Don't have an account? Register here.</a>
          </form>
        </div>
      </div>

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
        $query = "SELECT * FROM users WHERE username = '$username' AND PASSWORD = '$password'"; //username and password match
        
  
        //Execute query
        $result = $mysqli->query($query) or die($mysqli->error);
      
        if(mysqli_num_rows($result) == 0){ //user and password does not exist yet
              $query = "UPDATE users SET PASSWORD = '$password' WHERE USERNAME = '$username';";
      
              $result = $mysqli->query($query);
      
              // Verify the result
              if (!$result) {
                  die("Query failed: ($mysqli->error <br>");
              } 
              else {
                echo '<script>alert("Wrong username or password!")</script>'<br> <br>;
              }
          
            
        else{
            setcookie("username", $username, time() + (3600));
            header("Location:index.html");
            }
  
    ?>  

         </body>
      </html>


      <div id="footer">
        <div id="footertext">
          <img
            id="footer-logo"
            src="../pictures/white_out-there_img.png"
            alt="logo image"
          />
          <p>
            <a href="./about.html">About</a>
          </p>
          <p>
            <a href="./search.html">Search</a>
          </p>
          <p>
            <a href="./contact.html">Contact Us</a>
          </p>
          <p class="center">
            <a href="mailto:msu245@utexas.edu">&#169; Out There 04/05/2021</a>
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
