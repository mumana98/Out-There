<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['un'];
        $password = $_POST['pw'];
        setcookie('firstname', $_POST['fname'], time() + (10 * 365 * 24 * 60 * 60), '/');
        setcookie('lastname', $_POST['lname'], time() + (10 * 365 * 24 * 60 * 60), '/');
        setcookie('email', $_POST['email'], time() + (10 * 365 * 24 * 60 * 60), '/');
        setcookie('city', $_POST['city'], time() + (10 * 365 * 24 * 60 * 60), '/');
        setcookie('state', $_POST['state'], time() + (10 * 365 * 24 * 60 * 60), '/');
        $taken = false;
        $file = fopen("credentials.txt","r"); //read mode

        while(!feof($file)){
            $creds = explode(":", fgets($file));
            if($username == $creds[0]){
                $taken = true;
                header("Location: ../pages/register.html"); 
                break;
            }
        }
        if($taken == false){
            $fp = fopen('credentials.txt', 'a'); //append mode
            fwrite($fp, "\n" . $username . ':' . $password); 
            setcookie('loggedIn', true, time() + 120);
            header("Location: ../pages/search.html"); 
        }
        fclose($file);
        fclose($fp);

    }
?>