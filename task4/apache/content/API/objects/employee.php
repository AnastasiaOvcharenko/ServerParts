<?php

class Employee {
    private ?mysqli $conn;
    private string $table_name = "employee";

    public int $id;
    public ?string $name;
    public ?string $job;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "
        SELECT s.id, s.name, s.job FROM employee AS s
        ORDER BY s.id; 
        ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function create() {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->job = htmlspecialchars(strip_tags($this->job));

        $query = "INSERT INTO employee(name, job) VALUE ('".$this->name."', '".$this->job."');";

        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }

//     function readOne() {
//         $query = "SELECT s.id, s.name, s.surname FROM student AS s WHERE s.id = ".$this->id.";";
//         $result = $this->conn->query($query)->fetch_row();
//         return $result;
//     }

    function update() {
        $query = "
            UPDATE employee
            SET name = '".$this->name."', job = '".$this->job."'
            WHERE id = ".$this->id.";
            ";
        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }

    function delete() {
        $query = "DELETE FROM employee WHERE id = ".$this->id.";";
        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }
}