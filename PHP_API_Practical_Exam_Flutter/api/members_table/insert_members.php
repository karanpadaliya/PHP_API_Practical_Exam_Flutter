<?php

include "../../config.php";

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $config = new Config();

    $member_name = $_POST['name'];
    $phone = $_POST['phone'];



    $res = $config->insertMembers($member_name, $phone);

    if ($res) {
        $response = ["name" => $member_name];
        $response = ["phone" => $phone];
        $arr["data"] = ["msg" => "Member inserted....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Member insertion failed";
    }

} else {
    $arr["error"] = "Only POST http request is allowed";
}
echo json_encode($arr);

?>