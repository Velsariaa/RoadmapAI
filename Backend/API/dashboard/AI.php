<?php
header('Content-Type: application/json');

// Replace with your Google API key
$apiKey = 'AIzaSyBjHJSpWpUJTi5oXh3K2jyy2WNv6Ls-r2M';
<<<<<<< Updated upstream
$user_input = "make me a roadmap for python by filling this form topic and example only. dont add anything just fill this with this kind of structure.:
\"

1.) 
Maintopic:

Subtopic:

Example:

2.) 
Maintopic:

Subtopic:

Example:

3.) 
Maintopic:

Subtopic:

Example:

4.) 
Maintopic:

Subtopic:

Example:

5.) 
Maintopic:

Subtopic:

Example:

6.) 
Maintopic:

Example:

7.) 
Maintopic:

Subtopic:

Example:

8.) 
Maintopic:

Subtopic:

Example:

9.) 
Maintopic:

Subtopic:

Example:

10.) 
Maintopic:

Subtopic:

Example:

\"

follow the structure";
=======
$user_input = "Create me a python roadmap with 10 main topics, each main topic must consist sub topics with detailed explanation and examples and resource links. ";
>>>>>>> Stashed changes

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

    //echo json_encode($new);

    // Step 1: Split by numbered entries (e.g., "1.)", "2.)")
    $pattern = '/(\d+\.\))\s+/';
    $parts = preg_split($pattern, $text, -1, PREG_SPLIT_NO_EMPTY);

    // Step 2: Initialize an array to store structured data
    $roadmap = [];

    // Step 3: Loop through each part and extract Maintopic, Subtopic, and Example
    foreach ($parts as $index => $part) {
        $maintopic = $subtopic = $example = '';

        // Match Maintopic, optional Subtopic, and Example
        if (preg_match('/Maintopic:\s*\*\*(.*?)\*\*(?:\n\nSubtopic:\s*\*\*(.*?)\*\*)?\n\nExample:\s*(.*)/s', $part, $matches)) {
            $maintopic = trim($matches[1]);
            $subtopic = isset($matches[2]) ? trim($matches[2]) : null;
            $example = trim($matches[3]);

            // Clean up unnecessary spaces and newlines
            $maintopic = preg_replace('/\s+/', ' ', $maintopic);
            if ($subtopic) $subtopic = preg_replace('/\s+/', ' ', $subtopic);
            $example = preg_replace('/\s+/', ' ', $example);

            // Add each entry to the roadmap array
            $roadmap["Topic " . ($index + 1)] = [
                "Maintopic" => $maintopic,
                "Subtopic" => $subtopic,
                "Example" => $example,
            ];
        }
    }

    // Output the result as JSON
    echo json_encode($roadmap, JSON_PRETTY_PRINT);


}

// Close the cURL session
curl_close($curl);
?>