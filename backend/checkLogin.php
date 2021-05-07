<?php
    session_start();

    $loggedIn = isset($_SESSION['loggedIn']);

    if($loggedIn){
        echo "LOGGED IN";
    }
    else{
        echo "NOT LOGGED IN";
    }
?>