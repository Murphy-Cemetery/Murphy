<?php

require_once('inc/contact.class.php');
$validContactForm = new validateContactForm();

// set values to nothing to avoid conflicts
$name = "";
$fromEmail = "";
$message = "";

// error messages
$nameErrMsg = "";
$emailErrMsg = "";
$messageErrMsg = "";

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $fromEmail = $_POST['email'];
    $message = $_POST['message'];

    //$validContactForm->getDataFromForm();
    $validName = $validContactForm->validateName($name);
    $validEmail = $validContactForm->validateEmail($fromEmail);
    $validMessage = $validContactForm->validateMessage($message);
    //$validContactForm->saveData();

   // var_dump($validName);die;

    if($validName == "" && $validEmail == "" && $validMessage == ""){
        $mailTo = 'contact@davidhuck.net';
            $headers = "From: " . $fromEmail;
            $txt = "You have a new email from " . $name . ".\n\n" . $message;
            echo '<script> alert("Email Sent!")</script>';
            mail($mailTo, $txt, $message, $headers);
            header('Location: contactConfirmation.php');
            exit;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="css/contact.css" rel="stylesheet" type="text/css">
    <title>Contact</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">

    <a class="navbar-brand col-9 ml-3" href="index.html"><span class="navWhiteHead">Murphy Cemetery</span></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mr-2" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item pr-2">
                <a class="nav-link" href="../index.html"><span class="navWhite">Home</span></a>
            </li>
            <li class="nav-item pr-2">
                <a class="nav-link" href="about.html"><span class="navWhite">About</span></a>
            </li>
            <li class="nav-item active pr-2">
                <a class="nav-link" href="contact.php"><span class="navWhite">Contact</span></a>
            </li>
            <li class="nav-item pr-2">
                <a class="nav-link" href="#"><span class="navWhite">Search</span></a>
            </li>
        </ul>
    </div>
    </nav>

    <div class="container col-10">

        <main>
            <img src="images/contact.jpg" alt="murphy cemetery entrance">
        </main>
        
        <aside>
            <h1>Email Sent!</h1>
            <a href="contact.php">Back</a>
        </aside>

        <aside class="map">
            <center>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11849.51165807224!2d-93.3673001!3d42.0565183!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x98f0bf25c99a4095!2sMurphy%20Cemetery!5e0!3m2!1sen!2sus!4v1617830636912!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </center>
        </aside>

    </div>
    
    <footer>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 mb-2 mt-2">
                <center>
                    <a href="login.php" target="_blank">Login</a>
                </center>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                <center>
                    <p>&copy; Copywrite Murphy Cemetery <script> new Date().getFullYear()</script></p>
                </center>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                <center>
                    <p>Nevada, IA 50201</p>
                </center>
            </div>
        </div>
    </footer>
</body>
</html> 