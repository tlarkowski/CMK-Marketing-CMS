<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/8
 * Time: 14:38
 */
require_once 'db/conn.php';
require_once 'resources/Medoo.php';
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
          header("location:landing_page.php");
        } else {
            echo "login fail";
        }
    }

} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}


?>


<!-- <!doctype html>
<html>
<head>
    <title>Login</title>
</head> -->

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>CMK Marketing Reminder System Login Form</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">


</head>

<body>

<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>CMK Marketing Reminder System Login Form</h1>
  <!-- <span>Pen <i class='fa fa-code'></i> by <a href='http://andytran.me'>Andy Tran</a></span> -->
</div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form method="post" action="index.php">
      <div class="input-container">
        <input type="text" id="username" name="username" required="required"/>
        <label for="username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="password" name="password" required="required"/>
        <label for="password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>Go</span></button>
      </div>
      <div class="footer"><a href="#">Forgot your password?</a></div>
    </form>
  </div>
</div>

<!-- Portfolio-->
<!-- <a id="portfolio" href="http://andytran.me/" title="View my portfolio!"><i class="fa fa-link"></i></a> -->
<!-- CodePen-->
<!-- <a id="codepen" href="https://codepen.io/andytran/" title="Follow me!"><i class="fa fa-codepen"></i></a> -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script  src="js/index.js"></script>
<!-- <body> -->
<!-- <form method="post" action="login.php"> -->
    <!-- <label for="username">username</label>
    <input type="text" name="username" id="username" value=""/>
    <label for="password">password</label>
    <input type="text" name="password" id="password" value=""/> -->

    <!-- Only one of these will be set with their respective value at a time -->
    <!-- <input type="submit" name="login" value="Login"/> -->
<!-- </form> -->
</body>
</html>
