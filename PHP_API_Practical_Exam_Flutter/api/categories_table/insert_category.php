<?php

include "../../config.php";

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $config = new Config();

    $category_name = $_POST['name'];


    $res = $config->insertCategory($category_name);

    if ($res) {
        $response = ["name" => $category_name];
        $arr["data"] = ["msg" => "Category inserted....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Category insertion failed";
    }

} else {
    $arr["error"] = "Only POST http request is allowed";
}
echo json_encode($arr);

?>