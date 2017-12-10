<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/14
 * Time: 12:16
 * @param $mail_Address
 * @param $subjects
 * @param $content
 */


require_once __DIR__ . "/../resources/vendor/autoload.php";
require_once __DIR__ . "/../clients/searchUser.php";
require_once __DIR__ . "/../accounts/auth.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function sendMail($content, $user)
{
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 1;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'cmappcmkmarketing@gmail.com';                 // SMTP username
        $mail->Password = 'mitr2017';                           // SMTP password
//    $mail->SMTPSecure = false;
//    $mail->SMTPAutoTLS = false;
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to


        $mail->setFrom('cmappcmkmarketing@gmail.com', 'Reminder System');
        $mail->addAddress($user['Email_Address'], $user['FirstName'] . $user['LastName']);
        //Recipients

        //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Payment reminder";
        $mail->Body = $content;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

}

