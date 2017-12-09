<?php

require_once __DIR__ . "/email.php";
require_once __DIR__ . "/../clients/searchUser.php";


function findClientsDueDay()
{
    $data_conn = connection();
    $today = date("Y-m-d H:i:s");
    $two_weeks = date('Y-m-d H:i:s', strtotime("1 year", strtotime("-2 Weeks")));

    echo $two_weeks;
    $data = $data_conn->select("Client_Website", "*", [
        "Pay" => "0",
        "Annual_Renewal[<>]" => [$today, $two_weeks]
    ]);

    foreach ($data as $subscription) {
        echo $subscription['Site_Name'] . "<br>";
    }

}

findClientsDueDay();
//
//$content = "<p>Just a Test 2</p>";
//$recipient = 'Test';
//
//$all_user = all_users();
//
//sendMail($content);