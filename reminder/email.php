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

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.cmkmarketing.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'cmapp';                 // SMTP username
    $mail->Password = 'mitr2017';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 26;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('cmapp@cmkmarketing.com', 'Reminder System');
    $mail->addAddress('chinqrw@gmail.com', 'Ruowen Qin');     // Add a recipient

    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}


function sendMail($mail_Address, $subjects, $content)
{

}