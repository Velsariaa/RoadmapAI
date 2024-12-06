<?php
header('Content-Type: application/json');
// Allow requests from any origin (for development purposes)
header("Access-Control-Allow-Origin: *");
// Allow specific HTTP methods (POST, GET, OPTIONS)
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// Allow specific headers
header("Access-Control-Allow-Headers: Content-Type, Authorization");
require("codes/others/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $data = json_decode(file_get_contents("php://input"));

    if (isset($data->prompt) && isset($data->userID)) {
        $search = $data->prompt;
        $userID = $data->userID;

        
        // Replace with your Google API key
        $apiKey = 'AIzaSyBjHJSpWpUJTi5oXh3K2jyy2WNv6Ls-r2M';

        //$search = "Assembly";

        $user_input = "answer this strictly in Json format !!!, make me a roadmap about $search give me exactly 10 main topic with 1 link each where they can learn it also 2 sub topics each... follow this sample format 



        \"python\": {

            \"roadmap\": [

            {

                \"topic\": \"Python Basics\",

                \"link\": \"https://docs.python.org/3/tutorial/\",

                \"subtopics\": [

                \"Installation and Setup\",

                \"Introduction to Python Syntax\"

                ]

            },";

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

            //echo $text;

            $cleaned_json = str_replace(["```json", "```"], "", $text);

            $data2 = json_decode($cleaned_json, true);
            print_r($data2);

            $firstKey = key($data2);

            $rand_id = random_int(10000000000, 99999999999);
            $R_ID = $rand_id;
            //$U_ID = 11111111114;
            $iter = 1;

            $firstKey = key($data2); // $data2[$firstKey]
            foreach ($data2[$firstKey]['roadmap'] as $key) {
                $topic = $key['topic'];
                $link = $key['link'];
                $sub1 = $key['subtopics'][0];
                $sub2 = $key['subtopics'][1];
                $stmt = $conn->prepare("INSERT INTO roadmap (RoadmapID, UserID, MainTopic, Topic, SubTopic1, SubTopic2, Link, Iteration) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("iisssssi", $R_ID, $userID, $firstKey, $topic, $sub1, $sub2, $link, $iter);
                $stmt->execute();
                $iter += 1;
            }

            


            //SAMPLE CODE
            // $firstKey = key($data2); // $data2[$firstKey]
            // foreach ($data2[$firstKey]['roadmap'] as $key) {
            //     foreach ($key as $key1 => $value1) {
            //         echo $key1 . " = " . $value1;
            //     }
            // }


        }

        // Close the cURL session
        curl_close($curl);

            } else{
                echo json_encode(["status" => "error", "message" => "missing ID"]);
            }

        } else{
            echo json_encode(["status" => "error", "message" => "invalid request method"]);
        }

?>