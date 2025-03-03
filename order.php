<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Send email notification
    $to = "johnjohn031208@gmail.com";
    $subject = "New Order Received";
    $message = "Name: $name\nEmail: $email\nAddress: $address";
    $headers = "From: $email";

    // Append order to orders.html
    $order = "<p>Name: $name, Email: $email, Address: $address</p>\n";
    file_put_contents('orders.html', $order, FILE_APPEND | LOCK_EX);

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Order received successfully!";
    } else {
        echo "There was an error sending the email.";
    }
}
?>