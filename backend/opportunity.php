<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "on");
    session_start();
    $opportunity = array($_GET["Title"],$_GET["Organization"],$_GET["Location"], $_GET["InPerson"],$_GET["Date"]);

    if(!isset($_COOKIE['Opportunities'])) { //cookie doesnt exist
        $opportunities = array(); //make array
        array_push($opportunities,$opportunity); //push array into array
        setcookie('Opportunities', serialize($opportunities), time() + (10 * 365 * 24 * 60 * 60), '/');
        foreach ($opportunities as $value) {
            foreach($value as $a){
                echo $a;
            }
        }
        echo "opportunity created";
    }
    else{
        $opportunities = unserialize($_COOKIE['Opportunities']); //get already existing cookie
        array_push($opportunities,$opportunity); //push array to already existing cookie
        setcookie('Opportunities', serialize($opportunities), time() + (10 * 365 * 24 * 60 * 60), '/');

        echo "opportunity added";
    }

?>