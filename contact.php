<?php
/**
 * contact.php
 * Simple backend for the portfolio contact form.
 * Receives POST data, validates it, and emails it to you using PHP's mail().
 *
 * SETUP:
 * 1. Upload this file to the same server as your portfolio (must support PHP).
 *    mail() generally only works on real hosting (e.g. Hostinger, cPanel hosts) —
 *    it will NOT work on GitHub Pages, Netlify, or most free static hosts.
 * 2. Set $to_email below to your real email address.
 * 3. Make sure the form in portfolio.html sends a POST request to this file
 *    (see the fetch() call in portfolio.html's <script> — already wired up).
 */

// ---- CONFIG ----
$to_email = "your.email@example.com"; // <-- change this to your real email

// Only accept POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
    exit;
}

header("Content-Type: application/json");

// ---- HONEYPOT SPAM CHECK ----
// The form includes a hidden field named "website" that real users never fill in.
// If it has a value, it's almost certainly a bot — silently pretend success.
if (!empty($_POST["website"])) {
    echo json_encode(["success" => true, "message" => "Message sent."]);
    exit;
}

// ---- COLLECT + SANITIZE INPUT ----
$name    = trim($_POST["name"] ?? "");
$email   = trim($_POST["email"] ?? "");
$message = trim($_POST["message"] ?? "");

// ---- VALIDATION ----
$errors = [];

if ($name === "" || strlen($name) < 2) {
    $errors[] = "Please enter your name.";
}

if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}

if ($message === "" || strlen($message) < 10) {
    $errors[] = "Please write a message (at least 10 characters).";
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => implode(" ", $errors)]);
    exit;
}

// ---- CLEAN VALUES FOR EMAIL HEADERS (prevent header injection) ----
$name_clean  = str_replace(["\r", "\n"], "", $name);
$email_clean = str_replace(["\r", "\n"], "", $email);

// ---- BUILD EMAIL ----
$subject = "New portfolio message from $name_clean";

$body  = "You received a new message from your portfolio contact form.\n\n";
$body .= "Name: $name_clean\n";
$body .= "Email: $email_clean\n\n";
$body .= "Message:\n$message\n";

// "From" should be your own domain/server email, NOT the visitor's address,
// or many mail servers will flag it as spam. The visitor's email goes in Reply-To.
$headers  = "From: no-reply@" . ($_SERVER["HTTP_HOST"] ?? "yourdomain.com") . "\r\n";
$headers .= "Reply-To: $email_clean\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// ---- SEND ----
$sent = mail($to_email, $subject, $body, $headers);

if ($sent) {
    echo json_encode(["success" => true, "message" => "Thanks! Your message has been sent."]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Something went wrong. Please email me directly instead."]);
}