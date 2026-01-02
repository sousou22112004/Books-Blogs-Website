<?php
include "connect.php";
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(!isset($_GET['id'])){
    die("PDF not found!");
}

$pdf_id = intval($_GET['id']);
$pdfQuery = mysqli_query($con, "SELECT * FROM pdfs WHERE id = $pdf_id");
$pdf = mysqli_fetch_assoc($pdfQuery);

if(!$pdf){
    die("PDF not found!");
}
$pdfURL = "http://localhost/project/" . $pdf['pdf']; 
$successMessage = "";
$errorMessage = "";

if(isset($_POST['send'])){
    $name = $_POST['nom'];
    $email = $_POST['email'];

    $stmt = $con->prepare("INSERT INTO email (nom, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your email';
        $mail->Password = 'app password';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('your email', 'Your Company');
        $mail->addAddress($email, $name);

        $mail->Subject = 'Your PDF Download Link';
        $mail->isHTML(true);

        // HTML email body with DOWNLOAD BUTTON
        $mail->Body = "
            <h2>Hello $name,</h2>
            <p>Thank you for your interest!</p>
            <p>Click the button below to download your PDF:</p>

            <a href='$pdfURL' 
               style='display:inline-block;background:#0d6efd;color:white;
                      padding:12px 20px;font-size:16px;border-radius:6px;
                      text-decoration:none;font-weight:bold;'>
                📥 Download PDF
            </a>

            <br><br>
            <p>Best regards,<br>Your Company</p>
        ";

        $mail->send();
        $successMessage = "PDF download link sent successfully to $email!";

    } catch (Exception $e) {
        $errorMessage = "Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email PDF</title>
    <link rel="stylesheet" href="email.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        #iframe-container {
            height: 100%;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>

<div id="iframe-container">
    <iframe src="home.php" title="News Page"></iframe>
</div>

<!-- Modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pdfModalLabel">Send Your PDF</h5>
        <a href="home.php"><button type="button" class="button" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill="currentColor" d="M3.4 22L2 20.6L8.6 14H4v-2h8v8h-2v-4.6zM12 12V4h2v4.6L20.6 2L22 3.4L15.4 10H20v2z"/></svg></button></a>
      </div>
      <div class="modal-body">
        <?php if($successMessage): ?>
            <div class="alert alert-success"><?= $successMessage ?></div>
        <?php endif; ?>
        <?php if($errorMessage): ?>
            <div class="alert alert-danger"><?= $errorMessage ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="nom" class="form-label">   <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8t1.175-2.825T12 4t2.825 1.175T16 8t-1.175 2.825T12 12m-8 6v-.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13t3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2v.8q0 .825-.587 1.413T18 20H6q-.825 0-1.412-.587T4 18"/></svg>Full Name  </label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M19 8q-1.25 0-2.125-.875T16 5t.875-2.125T19 2t2.125.875T22 5t-.875 2.125T19 8M4 20q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h9.1q.4 0 .663.3T14 5q0 .275.025.513T14.1 6q.175.8.575 1.488T15.65 8.7L12 11L5.3 6.8q-.425-.275-.863-.025T4 7.525q0 .225.1.413t.3.312l7.075 4.425q.25.15.525.15t.525-.15l4.75-2.975q.425.15.85.225T19 10t.9-.075t.875-.25t.825.05t.4.65V18q0 .825-.588 1.413T20 20z"/></svg>Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <button type="submit" name="send" class="btn">Send PDF</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Automatically show modal when page loads
    const pdfModal = new bootstrap.Modal(document.getElementById('pdfModal'));
    pdfModal.show();
</script>

</body>
</html>
