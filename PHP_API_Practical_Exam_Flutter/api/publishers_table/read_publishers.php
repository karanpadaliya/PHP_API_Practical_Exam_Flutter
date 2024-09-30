<?php

include "../../config.php";

header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $config = new Config();

    $obj = $config->readPublishers();

    $response = [];

    while($record = mysqli_fetch_assoc($obj)){
        array_push($response, $record);
    }
    $arr["data"] = $response;

} else {
    $arr["error"] = "Only GET http request is allowed";
}
echo json_encode($arr);

?>