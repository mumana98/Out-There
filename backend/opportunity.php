<?php
    $opportunity = array($_POST["Title"],$_POST["Organization"],$_POST["Location"], $_POST["InPerson"],$_POST["Date"],$_POST["Description"]);

    if(!isset($_COOKIE['Opportunities'])) { //cookie doesnt exist
        $opportunities = array(); //make array
        array_push($opportunities,$opportunity); //push array into array
        setcookie("Opportunities", $opportunities, time() + 31556926, "/"); //set new cookie to 1 year life
    }
    else{
        $opportunities = $_COOKIE['Opportunities']; //get already existing cookie
        array_push($opportunities,$opportunity); //push array to already existing cookie
        setcookie("Opportunities", $opportunities, time() + 31556926, "/"); //set new cookie to 1 year life
    }

?>