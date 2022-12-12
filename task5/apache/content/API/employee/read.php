<?php

header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/employee.php";

$database = new Database();
$db = $database->getConnection();

$employee = new Employee($db);

$query_result = $employee->read();

$result = array("results" => array());
foreach ($query_result as $employee) {
    $employee_obj = array(
        "id" => $employee["id"],
        "name" => $employee["name"],
        "job" => $employee["job"]
    );
    $result["results"][] = $employee_obj;
}

http_response_code(200);
echo json_encode($result);