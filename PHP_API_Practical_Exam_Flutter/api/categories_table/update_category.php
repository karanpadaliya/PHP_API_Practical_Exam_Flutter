<?php

include "../../config.php";

header("Access-Control-Allow-Methods: PUT, PATCH");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "PUT" || $_SERVER["REQUEST_METHOD"] == "PATCH") {

    $config = new Config();

    $input = file_get_contents("php://input");

    parse_str($input, $_UPDATE);
    
    $category_name = $_UPDATE['name'];
    $category_id = $_UPDATE['id'];

    $res = $config->updateCategory($category_name, $category_id);

    if ($res == 1) {
        $response = ["id" => $category_id];
        $response = ["name" => $category_name];

        $arr["data"] = ["msg" => "Category update....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Category updation failed";
    }

} else {
    $arr["error"] = "Only PUT or PATCH http request is allowed";
}
echo json_encode($arr);

?>