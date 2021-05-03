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
        function ajaxFunction(server,user,pwd,dbName){
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
					
               var lastName = document.getElementById('lastName').value;
               var firstName = document.getElementById('firstName').value;
               var queryString = "?lastName=" + lastName ;
            
               queryString +=  "&firstName=" + firstName + "&server=" + server + "&user=" + user + "&pwd=" + pwd + "&dbName=" + dbName;
               
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
            <a href="./register.php">Don't have an account? Register here.</a>
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
      
      //create sql table
      if ($USERNAME != '' || $PASSWORD != '') {
        $mysqli = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
    }
    //Select database
    $mysqli->select_db($dbname) or die($mysqli->error);

    // Escape User Input to help prevent SQL Injection
    $USERNAME = $mysqli->real_escape_string($USERNAME);
    $PASSWORD = $mysqli->real_escape_string($PASSWORD);

    //build query
     $query = "SELECT username, password FROM USERS WHERE username = '$USERNAME' AND password = '$PASSWORD'";
     $result = $mysqli->query($query) or die($mysqli->error);

     if ($result->fetch_array(MYSQLI_ASSOC)) {
        setcookie("username", $username, time() + (3600));
        header("Location:search.html");
    } 
     else{
        echo '<script>alert("Wrong Username or password!");</script>';

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
