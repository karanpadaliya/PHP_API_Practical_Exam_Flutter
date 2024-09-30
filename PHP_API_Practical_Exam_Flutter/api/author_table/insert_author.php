<?php

include "../config.php";

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $config = new Config();

    $author_name = $_POST['name'];


    $res = $config->insertAuthor($author_name);

    if ($res) {
        $response = ["name" => $author_name];
        $arr["data"] = ["msg" => "Author inserted....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Author insertion failed";
    }

} else {
    $arr["error"] = "Only POST http request is allowed";
}
echo json_encode($arr);

?>