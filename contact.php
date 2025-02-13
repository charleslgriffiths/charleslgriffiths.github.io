<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input values
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Validate the input data
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Please ensure all fields are filled in correctly.";
        exit;
    }
    
    // Set the recipient email address (your email)
    $recipient = "clg@gmx.co.uk";
    
    // Create the email subject and content
    $subject = "New contact from $name";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Set the email headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo "Thank you for contacting me!";
    } else {
        echo "Oops! Something went wrong and I couldn’t send your message.";
    }
} else {
    echo "There was a problem with your submission. Please try again.";
}
?>
