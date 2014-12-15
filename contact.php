<?php
session_start();

		$name     = '';
        $email    = ''; 
        $message  = ''; 
        $pn       = ''; 
        $reason   = ''; 
		 
        if(isset($_POST['email'])) {

            if($_POST['captcha'] != $_SESSION['rand_code'])
            {
                echo "Wrong Code!";
                die;
            }

            $name    = $_POST['name'];
            $email   = $_POST['email'];
            $message = $_POST['message'];
			$pn      = $_POST['pn'];
			$reason  = $_POST['reason'];

            if(get_magic_quotes_gpc()) {
                    $message = stripslashes($message);
            }

             $address = "robot@psdtohtmlwp.com";

             $e_subject = 'Elegantia: You\'ve Received a Message From ' . $name . '.';

             $e_body = "Contact Details\r\n\n";

             $e_content = "Name: $name\n\nPhone: $pn\n\nEmail: $email\n\nReason: $reason\n\nMessage:\n\n\"$message\"\n\n";

             $e_reply = "You can contact $name via email, $email";

             $msg = $e_body . $e_content . $e_reply;

             mail($address, $e_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n","-f $address");
    
             echo "Message Sent Successfully!";
        }
        else
		{
            echo "Message Sending Failed!";
        }