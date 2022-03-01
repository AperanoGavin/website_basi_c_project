<?php 
  require 'vendor/autoload.php';
  use \Mailjet\Resources;
    $mj = new \Mailjet\Client('d4a4efd8e6af3e8b3016299090323ada','3fdba6a84e2d47e03d5dcf3d48d5fe94',true,['version' => 'v3.1']);

if(!empty($_POST['surname']) && !empty($_POST['firstname']) && !empty($_POST['_email']) && !empty($_POST['type']) && !empty($_POST['age']) && !empty($_POST['date1']) && !empty($_POST['select']) && !empty($_POST['__email']) && !empty($_POST['message'])){
        $surname = htmlspecialchars($_POST['surname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['_email']);
        $demail = htmlspecialchars($_POST['__email']);
        $message = htmlspecialchars($_POST['message']);
        $date =  htmlspecialchars($_POST['date1']);
        $select =  htmlspecialchars($_POST['select']);
        $age =  htmlspecialchars($_POST['age']);
        $type =  htmlspecialchars($_POST['type']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $body = [
            'Messages' => [
            [
                'From' => [
                    'Email' => "audesandrine6@icloud.com",
                    'Name' => "$surname"
                ],
                'To' => [
                [
                    'Email' => "$demail",
                    'Name' => "test"
                ]
                ],
                'Subject' => "SUJECT",
                'TextPart' => '$email, $message', 
                'HTMLPart' => "Hello, $email take appointment with u for $date who is $select for your dog $type who are $age year old",
                'CustomID' => "AppGettingStartedTest"
            ]
            ]
        ];
            $response = $mj->post(Resources::$Email, ['body' => $body]);
            $response->success();
            echo "Email envoyé avec succès !"; ?>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Clique here to return Accueil</a></li> 
            </ul>
            </div>;
            <?php
            echo '<img src="./uploads/chien.jpeg" alt="" width="500" height="500">';
        }
        else{

            echo "Email non valide";
        }

    } else {
        header('Location: index.php');
        die();
    }