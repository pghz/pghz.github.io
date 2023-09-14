<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file_path = __DIR__ . "/subscribed_emails.txt";

        // Use the file_put_contents function for simplicity
        if (file_put_contents($file_path, $email . PHP_EOL, FILE_APPEND | LOCK_EX) !== false) {
            echo "Thank you for subscribing!";
            exit();
        } else {
            // Handle file write error
            echo "Error: Unable to write to the file.";
        }
    } else {
        // Handle invalid email address
        echo "Invalid email address.";
    }
}
?>
