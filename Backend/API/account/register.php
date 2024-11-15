<?php
header('Content-Type: application/json');
// Allow requests from any origin (for development purposes)
header("Access-Control-Allow-Origin: *");
// Allow specific HTTP methods (POST in this case)
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// Allow specific headers
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $data = json_decode(file_get_contents("php://input"));

    // Validate required fields
    if (
        isset($data->username, $data->email, $data->password, $data->confirmpassword, $data->verificationCode) &&
        !empty($data->username) &&
        !empty($data->email) &&
        !empty($data->password) &&
        !empty($data->confirmpassword) &&
        !empty($data->verificationCode)
    ) {
        $username = $data->username;
        $email = $data->email;
        $password = $data->password;
        $confirmPassword = $data->confirmpassword;
        $verificationCode = $data->verificationCode;

        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(["status" => "error", "message" => "Invalid email format"]);
            exit();
        }

        // Check if passwords match
        if ($password !== $confirmPassword) {
            echo json_encode(["status" => "error", "message" => "Passwords do not match"]);
            exit();
        }

        // Here you would typically save the data to your database
        echo json_encode([
            "status" => "success",
            "message" => "Registration successful",
            "username" => $username,
            "email" => $email,
            "password" => $password
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Missing or empty required fields"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
