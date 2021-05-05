<?php 
if(isset($_POST['submit'])){
    $to = "ian@broopa.com";
    $from = $_POST['email']; 
    $name = $_POST['name'];
    $subject = "Form Submission from Broopa";
    $message = $name . " wrote the following:" . "\n\n" . $_POST['project'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$project,$headers);
    if ($_POST['submit']) {
        if (mail ($to, $subject, $message, $from)) {
            echo 'header('Location: thank_you.php');
        } else {
            echo '<p>Something went wrong, go back and try again!</p>';
        }
    }
    }
?>