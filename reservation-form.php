<?php
session_start();

		$name     = '';       
        $pn       = '';        
		$email    = ''; 
        $message  = '';
		$guests   = '';
		$date     = '';
		$time     = '';  
		 
        if(isset($_POST['email'])) {

            if($_POST['captcha'] != $_SESSION['res_rand_code'])
            {
                echo "Wrong Code!";
                die;
            }

            $name    = $_POST['name'];
            $email   = $_POST['email'];
            $message = $_POST['message'];
			$pn      = $_POST['pn'];
			$guests  = $_POST['guests'];
			$date    = $_POST['date'];
			$time    = $_POST['time'];
			

            if(get_magic_quotes_gpc()) {
                    $message = stripslashes($message);
            }

             $address = "robot@psdtohtmlwp.com";

             $e_subject = 'Elegantia: You\'ve Received a Message From ' . $name . '.';

             $e_body = "Elegantia: Reservation Application Form\r\n\n";

             $e_content = "Name: $name\n\nPhone: $pn\n\nEmail: $email\n\nDate: $date\n\nTime: $time\n\nNumber Of Guests: $guests\n\nSpecial Request:\n\n\"$message\"\n\n";

             $e_reply = "You can contact $name via email, $email";

             $msg = $e_body . $e_content . $e_reply;

             mail($address, $e_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n","-f $address");
    
             echo "Message Sent Successfully!";
        }
        else
		{
            echo "Message Sending Failed!";
        }