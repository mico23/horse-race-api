<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
class Customer {
    private $database;
    private $table_name = "Jockey";
    
    public $jockeyID;
    public $name;
    public $yoe;
    public $club;

    public function __construct($db) {
        $this->database = $db;
    }

    function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->database->executePlainSQL($query);

        return $stmt;
    }

    // modify this to join membership table
    function getJockeyInfo() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE jockeyID = " . $this->jockeyID;
        $stmt = $this->database->executePlainSQL($query);

        return $stmt;
    }

    function addJockey() {
        $query = "INSERT INTO " . $this->table_name . 
            " (jockeyID, name, yoe, club) VALUES ('" . 
            $this->jockeyID . "', '" . $this->name . "', '" . $this->yoe . "', '" . $this->club . "')";
        $stmt = $this->database->executePlainSQL($query);

        return $stmt;
    }

    function createJockey() {
        $query = "INSERT INTO " . $this->table_name . 
            " (jockeyID, name, yoe, club) VALUES ('" . 
            $this->jockeyID . "', '" . $this->name . "', '" . $this->yoe . "', '" . $this->club . "')";
        $stmt = $this->database->executePlainSQL($query);

        if (OCICommit($this->database->conn)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
