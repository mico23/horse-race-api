<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
class Customer {
    private $database;
    private $table_name = "Supplier";
    
    public $supplierID;
    public $name;
    public $type;
    public $phone;

    public function __construct($db) {
        $this->database = $db;
    }

    function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->database->executePlainSQL($query);

        return $stmt;
    }

    // modify this to join membership table
    function getSupplierInfo() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = " . $this->username;
        $stmt = $this->database->executePlainSQL($query);

        return $stmt;
    }

    function addSupplier() {
        $query = "INSERT INTO " . $this->table_name . 
            " (supplierID, name, phone, type) VALUES ('" . 
            $this->supplierID . "', '" . $this->name . "', '" . $this->phone . "', '" . $this->type . "')";
        $stmt = $this->database->executePlainSQL($query);

        return $stmt;
    }

    function createSupplier() {
        $query = "INSERT INTO " . $this->table_name . 
            " (supplierID, name, phone, type) VALUES ('" . 
            $this->supplierID . "', '" . $this->name . "', '" . $this->phone . "', '" . $this->type . "')";
        $stmt = $this->database->executePlainSQL($query);

        if (OCICommit($this->database->conn)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
