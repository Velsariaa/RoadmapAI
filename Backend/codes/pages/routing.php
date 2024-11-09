<?php

$user_link = parse_url($_SERVER['REQUEST_URI'])["path"];

switch($user_link){

    case "/":
        // require("API/home.php");
        break;
    case "/register":
        require("API/account/register.php");
        break;
    case "/user":
        require("API/dashboard/user.php");
        break;
    case "/AI":
        require("API/dashboard/AI.php");
        break;
    default:
        http_response_code(404);
        break;
        
}

?>