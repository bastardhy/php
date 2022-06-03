<?php 

 require_once('class.phpmailer.php');
 
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "bastardhy@gmail.com";
    $mail->Password = "lokalisasi";
    $mail->SMTPSecure = "ssl";  
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";
 
    $mail->setFrom('bastardhy@gmail.com', 'ardhy');
    $mail->AddAddress('bastardhy@hotmail', 'aradian');
 
    $mail->Subject  =  'using PHPMailer';
    $mail->IsHTML(true);
    $mail->Body    = 'Hi there ,
                        <br />
                        this mail was sent using PHPMailer...
                        <br />
                        cheers... :)';
  
     if($mail->Send())
     {
        echo "Message was Successfully Send :)";
     }
     else
     {
        echo "Mail Error - >".$mail->ErrorInfo;
     }
  
?>