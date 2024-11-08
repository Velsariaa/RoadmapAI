<?php
header('Content-Type: application/json');

// Example of getting user data from a database
// Here, you might fetch from a database or create static data.
$user_data = [
    'id' => 1,
    'name' => 'Justin Sheen',
    'email' => 'guiriba@gmail.com',
    'password' => '013234123123'
];

// Return data as JSON
echo json_encode($user_data);
?>