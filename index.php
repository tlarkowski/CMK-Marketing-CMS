<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/8
 * Time: 14:38
 */
require_once $_SERVER["DOCUMENT_ROOT"] . "/accounts/login.php";
date_default_timezone_set("EST");


//Strict using https
//if ($_SERVER["SCRIPT_URI"] == "http://cmapp.cmkmarketing.com/index.php") {
//    header('Location: https://cmapp.cmkmarketing.com/index.php');
//}

// Input: Username and Password
// Output: Bool for whether successful and store the successful result to session
//echo hash('sha256', 'test');
try {
    if (auth_check()) {
        header('Location: landing_page.php');

    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = $_POST['password'];
        $username = $_POST['username'];
        // check database record
        if (login($username, $password)) {
            header('Location: landing_page.php');
        } else {
            echo "login fail";
        }
    }

} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
?>

<html>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>CMK Marketing Reminder System Login Form</title>
    <link rel="shortcut icon" href="/favicon.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch'
          href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
</head>

<body>
<!-- Adapted from: https://codepen.io/anon/pen/POmxRB -->
<div id="login">
    <img src="/img/logo.png" alt="Company Logo">
    <h1>Reminder Customer Management System</h1>
    <hr/>

    <form method="post" action="index.php" name='form-login'>
        <span class="fontawesome-user"></span><input type="text" id="username" placeholder="Username" name="username"
                                                     required="required">

        <span class="fontawesome-lock"></span><input type="password" id="password" name="password"
                                                     placeholder="Password" required="required">

        <input type="submit" value="Sign In" class="green-button">
    </form>
</div>

<script src="js/index.js"></script>
</body>
</html>
