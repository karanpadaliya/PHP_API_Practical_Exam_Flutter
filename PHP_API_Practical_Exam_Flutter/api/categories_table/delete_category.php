<?php

include "../../config.php";

header("Access-Control-Allow-Methods: PUT, PATCH");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

    $config = new Config();

    $input = file_get_contents("php://input");

    parse_str($input, $_DELETE);
    
    $category_id = $_DELETE['id'];

    $res = $config->deleteCategory($category_id);

    if ($res == 1) {
        $response = ["id" => $category_id];

        $arr["data"] = ["msg" => "Category deleted....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Category deletion failed";
    }

} else {
    $arr["error"] = "Only DELETE http request is allowed";
}
echo json_encode($arr);

?>