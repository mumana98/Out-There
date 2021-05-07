<?php
    session_start();

    $loggedIn = isset($_SESSION['FirstName']);

    if($loggedIn){
        echo "LOGGED IN";
    }
    else{
        echo "NOT LOGGED IN";
    }
?>