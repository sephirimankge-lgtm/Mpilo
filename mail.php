//<?php
// Check if the form was submitted
//if (isset($_POST['submit'])) {
    // Collect and sanitize form data
    //$name = htmlspecialchars($_POST['name']);
   // $email = htmlspecialchars($_POST['email']);
    //$phone = htmlspecialchars($_POST['phone']);
    //$topic = htmlspecialchars($_POST['topic']); 
    //$message = htmlspecialchars($_POST['message']); 


    // Set recipient email and email subject
    //$recipient = "sephiri.mankge@gmail.com"; // <-- REPLACE WITH YOUR EMAIL ADDRESS
    //$email_subject = "New Contact Form Submission from $name";

    // Build the email body
    //$email_body = "You have received a new message from the contact form.\n\n";
    //$email_body .= "Name: $name\n";
    //$email_body .= "Email: $email\n";
    //$email_body .= "Phone: $phone\n";
    //$email_body .= "Topic: $topic\n";
    //$email_body .= "Message: $message\n";

    // Build the email headers
    //$headers = "From: sephiriworkplace@gmail.com\r\n"; // Replace with a sender email on your domain
    //$headers .= "Reply-To: $email\r\n";

    // Send the email
    //if (mail($recipient, $email_subject, $email_body, $headers)) {
        // Redirect to a thank you page or show a success message
        //header("Location: contact.html");
        //exit;
   // } else {
        //echo "An error occurred while sending your message. Please try again later.";
    //}
//} else {
    // If the form wasn't submitted, redirect back to the contact form
    //header("Location: contact.html");
    //exit;
//}
//?>


//<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
//require 'vendor/autoload.php';

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// Check if the form was submitted
if (isset($_POST['submit'])) {
     //Collect and sanitize form data
      $name = htmlspecialchars($_POST['name']);
      $emailadrdress = htmlspecialchars($_POST['email']);
      $phone = htmlspecialchars($_POST['phone']);
      $topic = ($_POST['topic']); 
      $message = ($_POST['message']); 

  try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'sephiriworkplace@gmail.com';                     //SMTP username
      $mail->Password   = 'qwgovxrfrmsmwvas';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('sephiriworkplace@gmail.com', 'Mailer');
      $mail->addAddress('sephiriworkplace@gmail.com', 'Joe User');     //Add a recipient
      //$mail->addAddress('ellen@example.com');               //Name is optional
      //$mail->addReplyTo('info@example.com', 'Information');
      $mail->addCC('sephiri.mankge@gmail.com');
      //$mail->addBCC('bcc@example.com');
  
      //Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
      // Build the email body
      $mail->isHTML(true);  
      $mail->Subject = 'Mpilo New Enquiry';
      $email->Body = '<h3> Hello you have a new enquiry</h3>
        <h4>name:'.$name.'</h4>
        <h4>email:'.$emailaddress.'</h4>
        <h4>phone:'.$phone.'</h4>
        <h4>topic:'.$topic.'</h4>
        <h4>message:'.$message.'</h4>
        ';
          
        //$email= "Name: $name\n";
        //$email= "Email: $email\n";
        //$email= "Phone: $phone\n";
        //$email= "Topic: $topic\n";
        //$email= "Message: $message\n";
    
      //if ($mail->send())
    
    if mail($email->Subject, $email->Body )
        //Redirect to a thank you page or show a success message
        echo : "message successfully sent";
        exit;
    } else {
        echo "An error occurred while sending your message. Please try again later.";
    }
  }
} else {
    // If the form wasn't submitted, redirect back to the contact form
    header("Location: index.html");
    echo "Not sent.";
    exit;
}
?>
