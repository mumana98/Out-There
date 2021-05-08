<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "on");
    session_start();
    $data = unserialize($_COOKIE['Opportunities']);
    $serialized = 'a:10:{s:7:"contact";s:1:"1";s:19:"profile_affiliation";s:23:"University, Inc.";s:18:"profile_first_name";s:3:"Ben";s:22:"profile_street_address";s:19:"8718 Tot Ave. S.";s:12:"profile_city";s:6:"Mobile";s:13:"profile_state";s:2:"AL";s:15:"profile_country";s:3:"USA";s:15:"profile_zipcode";s:5:"36695";s:18:"profile_home_phone";s:10:"2599494420";s:17:"profile_last_name";s:6:"Powers";}';

    $fixed = preg_replace_callback(
        '/s:([0-9]+):"(.*?)";/',
        function ($matches) { return "s:".strlen($matches[2]).':"'.$matches[2].'";';     },
        $serialized
    );
    $original_array=unserialize($fixed);

    echo $original_array;   

    foreach($original_array as $op) {
        echo "<div class='center-content-card'>
                <h2>$op[0]</h2>
                <table style='text-align: left;'>
                <tr>
                    <td><strong>Organization:</strong> $op[1]</td>
                    <td class='spacer'></td>
                    <td><strong>Location:</strong> $op[2]</td>
                </tr>
                <tr>
                    <td><strong>In-Person:</strong> $op[3]</td>
                    <td class='spacer'></td>
                    <td><strong>Date:</strong> $op[4]</td>
                </tr>
                </table>
                <div class='hr'></div>
                <a href='' class='button'>Volunteer Here</a>
            </div>";
    }
?>