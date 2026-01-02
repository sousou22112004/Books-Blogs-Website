<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'load_env.php';
include "connect.php";

loadEnv();

if (isset($_POST["send"])) {

    extract($_POST);
    $query="INSERT into subscribe values (null, '$email')";
    mysqli_query($con,$query) or die("erreur de requeste");
    header("location:home.php");



  $mail = new PHPMailer(true);

  try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = $_ENV['MAIL_HOST'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['MAIL_USERNAME']; 
    $mail->Password = $_ENV['MAIL_PASSWORD'];                 
    $mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];
    $mail->Port = $_ENV['MAIL_PORT'];

    // Recipients
    $mail->setFrom($_POST["email"]);
    $mail->addAddress($_ENV['MAIL_USERNAME']);
    $mail->addReplyTo($_POST["email"]);

    $mail->isHTML(true);
    $mail->Subject = "New Contact Form Submission";
    $mail->Body = "
      <h3>New submission received:</h3>
      <p><strong>Email:</strong> {$_POST['email']}</p>
    ";

    $mail->send();

    echo "
      <script> 
        alert('Message was sent successfully!');
        document.location.href = 'home.php';
      </script>
    ";

  } catch (Exception $e) {
    echo "
      <script>
        alert('Message could not be sent. Error: {$mail->ErrorInfo}');
        document.location.href = 'home.php';
      </script>
    ";
  }
}
?>