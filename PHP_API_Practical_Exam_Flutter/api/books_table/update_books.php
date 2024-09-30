<?php

include "../../config.php";

header("Access-Control-Allow-Methods: PUT, PATCH");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "PUT" || $_SERVER["REQUEST_METHOD"] == "PATCH") {

    $config = new Config();

    $input = file_get_contents("php://input");

    parse_str($input, $_UPDATE);
    
    $title = $_UPDATE['title'];
    $book_id = $_UPDATE['id'];

    $res = $config->updatePublishers($title, $book_id);

    if ($res == 1) {
        $response = ["id" => $book_id];
        $response = ["name" => $title];

        $arr["data"] = ["msg" => "Book update....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Book updation failed";
    }

} else {
    $arr["error"] = "Only PUT or PATCH http request is allowed";
}
echo json_encode($arr);

?>