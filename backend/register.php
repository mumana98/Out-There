<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $taken = false;
        $file = fopen("credentials.txt","r"); //read mode

        while(!feof($file)){
            $creds = explode(":", fgets($file));
            if($username == $creds[0]){
                $taken = true;
                header("Location: ./pages/profile.html"); 
                break;
            }
        }
        if($taken == false){
            $fp = fopen('credentials.txt', 'a'); //append mode
            fwrite($fp, "\n" . $username . ':' . $password); 
            setcookie('loggedIn', true, time() + 120);
            header("Location: ./pages/search.html"); 
        }
        fclose($file);
        fclose($fp);

    }
?>