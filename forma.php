<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST">
    <input type="text" name="email" placeholder="Email" />
    <input type="text" name="ime" placeholder="ime i prezime" />
    <input type="textarea" name="textarea" placeholder="Text" />
    <input type="submit" name="submit" value="Posalji" />
</form>

<?php
if(isset($_POST['submit'])){
    //mail(string $to, string $subject, string $message, array|string $additional_headers = [], string $additional_params = ""); 
    $to = "vladimir.ivanovic@softline.rs";
    $subject = $_POST['ime']." ".$_POST['email'];
    $message = $_POST['textarea'];
    mail($to,$subject,$message);
    echo "uspesno ste poslali mail.";
}
?>

</body>
</html>