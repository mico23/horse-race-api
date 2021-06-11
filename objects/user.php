<?php
class User {
    private $database;
    private $table_name = "\"User\"";

    public $username;
    public $password;

    public function __construct($db) {
        $this->database = $db;
    }

    function login() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = " . $this->username . " AND password = " . $this->password;
        $stmt = $this->database->executePlainSQL($query);

        return $stmt;
    }

    function createUser() {
        $query = "INSERT INTO " . $this->table_name . " VALUES ('" . $this->username . "', '" . $this->password . "')";
        $stmt = $this->database->executePlainSQL($query);
        
        if (OCICommit($this->database->conn)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
