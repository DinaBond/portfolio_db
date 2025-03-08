<?php
require_once('includes/connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$msg = $_POST['message'];

$errors = [];

$name = trim($name);
$email = trim($email);
$number = trim($number);
$msg = trim($msg);

if (empty($name)) {
    $errors['name'] = 'Name cannot be empty';
}
if (empty($number)) {
    $errors['number'] = 'Number cannot be empty';
}
if (empty($msg)) {
    $errors['message'] = 'Message field cannot be empty';
}
if (empty($email)) {
    $errors['email'] = 'You must provide an email';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'You must provide a REAL email';
}

if (empty($errors)) {
        $query = "INSERT INTO contact (full_name, email, number, message) VALUES (?,?,?,?)";
        $stmt = $connect->prepare($query);
       
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->bindParam(2, $email, PDO::PARAM_STR);
        $stmt->bindParam(3, $number, PDO::PARAM_STR);
        $stmt->bindParam(4, $msg, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // $to = 'd_bondarchuk@fanshaweonline.ca';
            // $subject = 'Message from your Portfolio Website!';
            // $message = "You have received a new contact form submission:\n\n";
            // $message .= "Name: " . $name . " \n";
            // $message .= "Email: " . $email . "\n\n";

            // mail($to, $subject, $message);
       echo json_encode(array("message" => "Thank you for your message!"));
        } 

        $stmt = null;
} else {
   echo json_encode(array("errors" => array_values($errors)));
}
?>