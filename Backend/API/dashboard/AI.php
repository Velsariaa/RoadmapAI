<?php
header('Content-Type: application/json');

// Replace with your Google API key
$apiKey = 'AIzaSyBjHJSpWpUJTi5oXh3K2jyy2WNv6Ls-r2M';
$user_input = "Sino pumatay kay lapu-lapu. Answer Only no explanation";

// Set up the data to be sent as JSON
$data = [
    "contents" => [
        [
            "parts" => [
                ["text" => $user_input]
            ]
        ]
    ]
];

// Initialize cURL
$curl = curl_init();

// Set the URL, including the API key
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $apiKey;
curl_setopt($curl, CURLOPT_URL, $url);

// Specify that we are sending a POST request
curl_setopt($curl, CURLOPT_POST, true);

// Set the JSON-encoded data as the POST fields
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

// Set headers
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);

// Specify that we want to get the response back as a string
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Execute the request and capture the response
$response = curl_exec($curl);

// Check for errors
if (curl_errno($curl)) {
    echo "cURL Error: " . curl_error($curl);
} else {
    // Display the response
    $data = json_decode($response, true);
    $text = $data['candidates'][0]["content"]["parts"][0]['text'];

    $new = [
        'Topic' => $user_input,
        'Answer' => $text,
    ];

    echo json_encode($new);
}

// Close the cURL session
curl_close($curl);
?>