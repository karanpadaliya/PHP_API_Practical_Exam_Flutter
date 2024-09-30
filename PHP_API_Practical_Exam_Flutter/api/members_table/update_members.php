<?php

include "../../config.php";

header("Access-Control-Allow-Methods: PUT, PATCH");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "PUT" || $_SERVER["REQUEST_METHOD"] == "PATCH") {

    $config = new Config();

    $input = file_get_contents("php://input");

    parse_str($input, $_UPDATE);
    
    $member_name = $_UPDATE['name'];
    $phone = $_UPDATE['phone'];
    $member_id = $_UPDATE['id'];

    $res = $config->updateMembers($member_name, $phone, $member_id);

    if ($res == 1) {
        $response = ["id" => $member_id];
        $response = ["name" => $member_name];
        $response = ["name" => $phone];

        $arr["data"] = ["msg" => "Members update....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Members updation failed";
    }

} else {
    $arr["error"] = "Only PUT or PATCH http request is allowed";
}
echo json_encode($arr);

?>