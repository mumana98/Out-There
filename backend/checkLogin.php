<?php
    session_start();

    $loggedIn = isset($_SESSION['firstName']);

    if($loggedIn){
        echo "LOGGED IN";
    }
    else{
        echo "NOT LOGGED IN";
    }
?>