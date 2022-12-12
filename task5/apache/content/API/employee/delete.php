<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/database.php";
include_once "../objects/employee.php";

$database = new Database();
$db = $database->getConnection();

$employee = new Employee($db);

if (!isset($_GET["id"])) {
    http_response_code(400);
    echo json_encode(array("message" => "Не указан ID"));
} else {
    $employee->id = $_GET["id"];
    $stmt = $employee->delete();
    if ($stmt) {
        http_response_code(200);
        echo json_encode(array("message" => "Работник удалён"));
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Работника нет в базе данных"));
    }
}