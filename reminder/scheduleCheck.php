<?php

require_once __DIR__ . "/email.php";
require_once __DIR__. "/../clients/searchUser.php";


$content = "<p>Just a Test 2</p>";
$recipient = 'Test';

$all_user = all_users();

sendMail($content);