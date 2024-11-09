<?php
header('Content-Type: application/json');

$user_data = [
    'id' => 1,
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'password' => '01324123123'
];

// Return data as JSON
echo json_encode($user_data);
?>