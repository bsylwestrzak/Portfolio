<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Rakit\Validation\Validator;

class App {

    public function run() {

        $validator = new Validator;

        $validation = $validator->make($_POST, [
            'firstname'             => 'required|min:3|max:40',
            'lastname'              => 'required|min:3|max:40',
            'email'                 => 'required|email|max:50',
            'content'               => 'required|min:20|max:1000'
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors();
            $keys = ['firstname', 'lastname', 'email', 'content'];
            foreach ($keys as $key) {
                $_SESSION['errors_' . $key] = $validation->errors()->get($key);
                $_SESSION['previous_' . $key] = $_POST[$key];
            }
        } else {
            if($this->sendMail()) {
                $_SESSION['mail_success'] = true;
            }
        }

        header("Location: /mail.php");

    }

    private function sendMail() : bool {

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'testmailkaka@gmail.com';               // SMTP username
            $mail->Password   = 'roottestmail01210';                    // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet = 'UTF-8';

            //Recipients
            $mail->setFrom('testmailkaka@gmail.com', 'BS Portfolio');
            $mail->addAddress('mikowis5@gmail.com');                    // Add a recipient

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Nowa wiadomość z formularza portfolio - ' . $_POST['name'];
            $mail->Body    = 'Nadawca: ' . $_POST['name'] . '<br>' . $_POST['email'] . '<br><br>' . $_POST['content'];

            $mail->send();

            return true;

        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }

    }

}