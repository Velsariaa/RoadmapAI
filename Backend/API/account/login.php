<?php
header('Content-Type: application/json');
// Enable CORS for local development
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $data = json_decode(file_get_contents("php://input"));

    // Check if data is valid
    if (isset($data->username) && isset($data->password)) {
        $username = $data->username;
        $password = $data->password;

        // Do something with the data (e.g., save to database, send email, etc.)
        // Here, we just return the data for demonstration
        echo json_encode(["status" => "success", "message" => "Data received", "name" => $username, "email" => $password]);
    } else {
        echo json_encode(["status" => "error", "message" => "Missing name or email"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>