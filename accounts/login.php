<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/8
 * Time: 14:38
 */
require_once '../db/conn.php';
require_once '../resources/Medoo.php';
date_default_timezone_set("EST");



// Input: Username and Password
// Output: Bool for whether successful and store the successful result to session
function login($username, $password)
{
    $data_con = connection();
    $data = $data_con->select("CMK_User", "*", [
        "AND" => [
            "Username" => $username,
            "Password" => $password
        ]
    ]);

    if (count($data) == 0) {
        echo "Wrong password or Username doesn't exist";
        return false;
    }
    session_start();
    // store session data
    //todo update login time
    $_SESSION['user'] = $data[0];
    $data_con->update("CMK_User", [
            "Last_Login_Time" => date('Y-m-d H:i:s')
    ],[
            "User_ID" => $data[0]['User_ID']
    ]);
    echo $_SESSION['user']["Username"];
    return true;
}


try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = $_POST['password'];
        $username = $_POST['username'];
        // check database record
        if (login($username, $password)) {
            echo "login successful";
        } else {
            echo "login fail";
        }
    }

} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}


?>


<!doctype html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<form method="post" action="login.php">
    <label for="username">username</label>
    <input type="text" name="username" id="username" value=""/>
    <label for="password">password</label>
    <input type="text" name="password" id="password" value=""/>
    <!-- Only one of these will be set with their respective value at a time -->
    <input type="submit" name="login" value="Login"/>
</form>
</body>