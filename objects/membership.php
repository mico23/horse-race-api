<?php
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
            " (memberID, fee, standing, type) VALUES (" . 
            $this->memberID . ", " . $this->fee . ", " . $this->standing . ", " . $this->type . ")";
        $stmt = $this->database->executePlainSQL($query);

        if (OCICommit($this->database->conn)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
