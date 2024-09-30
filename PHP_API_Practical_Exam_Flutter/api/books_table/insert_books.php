<?php

include "../../config.php";

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $config = new Config();

    $title = $_POST['name'];
    $author_id = $_POST['author_id'];
    $category_id = $_POST['category_id'];
    $publisher_id = $_POST['publisher_id'];


    $res = $config->insertBooks($title, $author_id, $category_id, $publisher_id);

    if ($res) {
        $response = ["name" => $title];
        $arr["data"] = ["msg" => "Book inserted....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Book insertion failed";
    }

} else {
    $arr["error"] = "Only POST http request is allowed";
}
echo json_encode($arr);

?>