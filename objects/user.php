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
}
?>
