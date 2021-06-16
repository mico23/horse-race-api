<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
class Customer {
    private $database;
    private $table_name = "Stadium";
    
    public $name;
    public $address;
    public $capacity;

    public function __construct($db) {
        $this->database = $db;
    }

    function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->database->executePlainSQL($query);

        return $stmt;
    }

    // modify this to join membership table
    function getStadiumInfo() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE address = " . $this->address;
        $stmt = $this->database->executePlainSQL($query);

        return $stmt;
    }

    function addStadium() {
        $query = "INSERT INTO " . $this->table_name . 
            " (address, name, capacity) VALUES ('" . 
            $this->address . "', '" . $this->name . "', '" . $this->capacity . "')";
        $stmt = $this->database->executePlainSQL($query);

        return $stmt;
    }

    function createStadium() {
        $query = "INSERT INTO " . $this->table_name . 
            " (address, name, capacity) VALUES ('" . 
            $this->address . "', '" . $this->name . "', '" . $this->capacity . "')";
        $stmt = $this->database->executePlainSQL($query);

        if (OCICommit($this->database->conn)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
