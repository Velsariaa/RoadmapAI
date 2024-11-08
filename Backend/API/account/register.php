<?php
header('Content-Type: application/json');

// Example of getting user data from a database
// Here, you might fetch from a database or create static data.
$user_data = [
    'id' => 1,
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'password' => '01324123123'
];

// Return data as JSON
echo json_encode($user_data);
?>