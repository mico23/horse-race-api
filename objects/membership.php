<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
class Membership {
    private $database;
    private $table_name = "\"Membership\"";

    public $memberID;
    public $fee;
    public $standing;
    public $type;

    public function __construct($db) {
        $this->database = $db;
    }

    function createMember() {
        $query = "INSERT INTO " . $this->table_name . 
            " (memberID, fee, standing, type) VALUES ('" . 
            $this->memberID . "', " . $this->fee . ", '" . $this->standing . "', '" . $this->type . "')";
        $stmt = $this->database->executePlainSQL($query);

        if (OCICommit($this->database->conn)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
