<?php
header('Content-Type: application/json');
// Enable CORS for local development
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");

require("codes/others/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $data = json_decode(file_get_contents("php://input"));

    // Check if data is valid
    if (isset($data->username) && isset($data->password)) {
        $username = $data->username;
        $password = $data->password;

        $stmt = $conn->prepare("Select * from users where Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result(); // Get the result of the query

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if($user["Password"] == $password){

                echo json_encode(["status" => "success", "message" => "Data received", "name" => $username, "email" => $password]);

            } else {

                echo json_encode(["status" => "error", "message" => "Username or Password Incorrect!", "name" => $username, "email" => $password]);

            }
        } else {

            echo json_encode(["status" => "error", "message" => "Username or Password Incorrect!", "name" => $username, "email" => $password]);

        }

    } else {

        echo json_encode(["status" => "error", "message" => "Missing name or email"]);
        
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>