<?php 

    header('Content-type: application/json');
    require_once '../config/connection.php';

    $user = $_POST["user_name"];
    $email = $_POST["user_email"];
    $password = $_POST["user_password"];
    $subject = '<a href="http://localhost/soundWaves/verify.php?id='. base64_encode($email) .'">Click here to verify your email and activate your SoundWaves account</a>';

    $sql_verify = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($sql_verify) > 0){
        $response_array['status'] = "fail";
    } else {

        date_default_timezone_set('Europe/London');

        require '../phpmailer/PHPMailerAutoload.php';

        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "soundwavesandmore@gmail.com";

        //Password to use for SMTP authentication
        $mail->Password = "~Budapest01";

        //Set who the message is to be sent from
        $mail->setFrom('soundwavesandmore@gmail.com', 'SoundWaves');

        //Set an alternative reply-to address
        $mail->addReplyTo('no-reply@example.com', '');

        //Set who the message is to be sent to
        $mail->addAddress($email, $user);

        //Set the subject line
        $mail->Subject = 'Confirm your email @ SoundWaves';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML('<!DOCTYPE html><html><body>"'.$subject.'"</body></html>');

        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';

        //Attach an image file
        $mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
            $response_array['status'] = "mail_failed";
        } else {
            $sql_insert = 
                mysqli_query($con, "INSERT INTO users(name,email,password)VALUES('$user', '$email', '$password')");
            $response_array['status'] = "success";
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
        }

        // $sql_insert = 
        //     mysqli_query($con, "INSERT INTO users(name,email,password)VALUES('$user', '$email', '$password')");
        
        // if($sql_insert){
        //     $response_array['status'] = "success";
        // } else {
        //     echo "Error: " . $sql_insert . "" . mysqli_error($con);
        // };
    }


    echo json_encode($response_array);
?>