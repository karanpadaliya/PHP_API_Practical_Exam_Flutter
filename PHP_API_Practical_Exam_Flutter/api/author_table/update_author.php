<?php

include "../config.php";

header("Access-Control-Allow-Methods: PUT, PATCH");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "PUT" || $_SERVER["REQUEST_METHOD"] == "PATCH") {

    $config = new Config();

    $input = file_get_contents("php://input");

    parse_str($input, $_UPDATE);
    
    $author_name = $_UPDATE['name'];
    $author_id = $_UPDATE['id'];

    $res = $config->updateAuthor($author_name, $author_id);

    if ($res == 1) {
        $response = ["id" => $author_id];
        $response = ["name" => $author_name];

        $arr["data"] = ["msg" => "Author update....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Author updation failed";
    }

} else {
    $arr["error"] = "Only PUT or PATCH http request is allowed";
}
echo json_encode($arr);

?>