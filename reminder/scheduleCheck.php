<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/accounts/auth.php";

require_once __DIR__ . "/email.php";


//foreach ($arr as $k => $v) {
//}

$all_user = all_users();

foreach ($all_user as $user) {
//    echo $user['LastName'];
    $_SESSION['email'] = $user;
    $Vdata = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/reminder/email-html.php");
//    $content = $Vdata;
}
echo $Vdata;


//sendMail($content);