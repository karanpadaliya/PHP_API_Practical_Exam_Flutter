<?php

include "../config.php";

header("Access-Control-Allow-Methods: PUT, PATCH");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

    $config = new Config();

    $input = file_get_contents("php://input");

    parse_str($input, $_DELETE);
    
    $author_id = $_DELETE['id'];

    $res = $config->deleteAuthor($author_id);

    if ($res == 1) {
        $response = ["id" => $author_id];

        $arr["data"] = ["msg" => "Author deleted....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Author deletion failed";
    }

} else {
    $arr["error"] = "Only DELETE http request is allowed";
}
echo json_encode($arr);

?>