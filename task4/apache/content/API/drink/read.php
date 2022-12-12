<?php

header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/drink.php";

$database = new Database();
$db = $database->getConnection();

$drink = new Drink($db);

$query_result = $drink->read();

$result = array("results" => array());
foreach ($query_result as $drink) {
    $drinks_obj = array(
        "id" => $drink["id"],
        "name" => $drink["name"],
        "type" => $drink["type"]
    );
    $result["results"][] = $drinks_obj;
}

http_response_code(200);
echo json_encode($result);