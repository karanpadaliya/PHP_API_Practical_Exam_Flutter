<?php

include "../../config.php";

header("Access-Control-Allow-Methods: PUT, PATCH");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

    $config = new Config();

    $input = file_get_contents("php://input");

    parse_str($input, $_DELETE);
    
    $publishers_id = $_DELETE['id'];

    $res = $config->deletePublishers($publishers_id);

    if ($res == 1) {
        $response = ["id" => $publishers_id];

        $arr["data"] = ["msg" => "Publishers deleted....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Publishers deletion failed";
    }

} else {
    $arr["error"] = "Only DELETE http request is allowed";
}
echo json_encode($arr);

?>