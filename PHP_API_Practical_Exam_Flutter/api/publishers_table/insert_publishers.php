<?php

include "../../config.php";

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $config = new Config();

    $publishers_name = $_POST['name'];


    $res = $config->insertPublishers($publishers_name);

    if ($res) {
        $response = ["name" => $publishers_name];
        $arr["data"] = ["msg" => "Publishers inserted....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Publishers insertion failed";
    }

} else {
    $arr["error"] = "Only POST http request is allowed";
}
echo json_encode($arr);

?>