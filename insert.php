
<?php include"conn.php"; ?>

<?php


    //$emailClass = new Email();

    //$errors = array();

if (isset($_POST["submit"])){
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $message = $_POST["message"];
            
            $sql = "INSERT INTO contact (name, email, message ) VALUES ('$fname', '$email', '$message')";
            if (mysqli_query($con, $sql)) {
                echo "<div class='alert alert-success'> 
                <strong>New Reccord Added</strong>
                </div>";

                //send mail
                require 'PHPMailer/PHPMailerAutoload.php';

                 

                $mail = new PHPMailer;

                $email2="testfirst229@gmail.com";
                $subject="message";

                //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = '@gmail.com';                 // SMTP username
                $mail->Password = '********** pwrd';                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;                                    // TCP port to connect to

                $mail->AddReplyTo($email);
                $mail->From = $email2;
                $mail->FromName = $fname;
                $mail->addAddress('abdelhakf95@gmail.com', 'Admin');     // Add a recipient

                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = $subject;
                $mail->Body = $message;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'true';
                }

                
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
          
           /*$msg_template = "
                From : ".$email."
                Name : ".$fname."
                Message: ".$message."
                           ";
            $emailClass->sendEmail('abdelhakf95@gmail.com', $msg_template);
            $success = "Email Sent Successfully";*/

            
    }
    
    mysqli_close($con);   
    
    ?>