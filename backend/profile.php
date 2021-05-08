<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "on");
    session_start();
    $data = unserialize($_COOKIE['Opportunities'], ["allowed_classes" => false]);
    foreach($data as $op) {
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