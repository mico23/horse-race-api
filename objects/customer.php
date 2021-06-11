<?php
class Customer {
    private $database;
    private $table_name = "\"Customer\"";
    
    public $accountID;
    public $name;
    public $balance;
    public $address;
    public $memberID;
    public $username;

    public function __construct($db) {
        $this->database = $db;
    }

    function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->database->executePlainSQL($query);

        return $stmt;
    }
}
?>
