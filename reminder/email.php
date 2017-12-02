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


require_once $_SERVER["DOCUMENT_ROOT"] . "/resources/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function sendMail($mail_Address, $recipient, $subjects, $content)
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

        //Recipients
        $mail->setFrom('cmappcmkmarketing@gmail.com', 'Reminder System');
        $mail->addAddress($mail_Address, $recipient);     // Add a recipient

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

function mailCreateSubscription($user_ID, $subscription_ID, $company_ID, $project_ID)
{

}

function mailCreateProject($user_ID, $subscription_ID, $company_ID, $project_ID)
{

}