<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['un'];
        $password = $_POST['pw'];
        $file = fopen("credentials.txt", "r");
        while(!feof($file)){

            $creds = explode(":", fgets($file)); 
            $a = str_replace(array("\n", "\r"), '', $creds[0]);
            $b = str_replace(array("\n", "\r"), '', $creds[1]);

            if(($username == $a) && ($password == $b)){
                echo "<p>" . "Logging In" . "</p>";

                ob_start();
                setcookie('loggedIn', true, time() + 3600 * 3, '/');
                ob_end_flush();

                $_COOKIE['loggedIn'] = true;
                header("Location: ../pages/search.html");
                fclose($file);
                break;
            }
        }
        echo "<p style='color:red'>" . "Incorrect Username or Password" . "</p>";
        setcookie('login_fail', true, time() + 160, '/');
        header("Location: ../pages/login.html");
    }
?>