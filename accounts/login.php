<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/8
 * Time: 14:38
 */
require_once $_SERVER["DOCUMENT_ROOT"] . "/db/conn.php";

date_default_timezone_set("EST");


// Input: Username and Password
// Output: Bool for whether successful and store the successful result to session
function login($username, $password)
{
    $data_con = connection();
    $password = hash('sha256', $password);
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
    // store session data
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['user'] = $data[0];
    echo $_SESSION['user'];
    $data_con->update("CMK_User", [
        "Last_Login_Time" => date('Y-m-d H:i:s')
    ], [
        "User_ID" => $data[0]['User_ID']
    ]);
    echo $_SESSION['user']["Username"];
    return true;
}

//
//try {
//    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//        $password = $_POST['password'];
//        $username = $_POST['username'];
//        // check database record
//        if (login($username, $password)) {
//            echo "login successful";
//        } else {
//            echo "login fail";
//        }
//    }
//
//} catch (Exception $e) {
//    echo 'Message: ' . $e->getMessage();
//}


function auth_check()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }

}
