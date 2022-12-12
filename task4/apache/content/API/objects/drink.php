<?php

class Drink {
    private ?mysqli $conn;
    private string $table_name = "drink";

    public int $id;
    public ?string $name;
    public ?string $type;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "
        SELECT s.id, s.name, s.type FROM drink AS s
        ORDER BY s.id; 
        ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function create() {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->type = htmlspecialchars(strip_tags($this->type));

        $query = "INSERT INTO drink(name, type) VALUE ('".$this->name."', '".$this->type."');";

        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }

//     function readOne() {
//         $query = "SELECT s.id, s.name, s.description FROM course AS s WHERE s.id = ".$this->id.";";
//         $result = $this->conn->query($query)->fetch_row();
//         return $result;
//     }

    function update() {
        $query = "
            UPDATE drink
            SET name = '".$this->name."', type = '".$this->type."'
            WHERE id = ".$this->id.";
            ";
        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }

    function delete() {
        $query = "DELETE FROM drink WHERE id = ".$this->id.";";
        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }
}