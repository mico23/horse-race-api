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
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = " . $this->username . " AND password = " . $this->password;
        $stmt = $this->database->executePlainSQL($query);

        return $stmt;
    }
}
?>
