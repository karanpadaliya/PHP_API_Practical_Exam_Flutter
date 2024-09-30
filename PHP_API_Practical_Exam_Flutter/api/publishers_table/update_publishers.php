<?php

include "../../config.php";

header("Access-Control-Allow-Methods: PUT, PATCH");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "PUT" || $_SERVER["REQUEST_METHOD"] == "PATCH") {

    $config = new Config();

    $input = file_get_contents("php://input");

    parse_str($input, $_UPDATE);
    
    $publishers_name = $_UPDATE['name'];
    $publishers_id = $_UPDATE['id'];

    $res = $config->updatePublishers($publishers_name, $publishers_id);

    if ($res == 1) {
        $response = ["id" => $publishers_id];
        $response = ["name" => $publishers_name];

        $arr["data"] = ["msg" => "Publishers update....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Publishers updation failed";
    }

} else {
    $arr["error"] = "Only PUT or PATCH http request is allowed";
}
echo json_encode($arr);

?>