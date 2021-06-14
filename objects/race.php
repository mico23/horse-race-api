<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
class Race {
    private $database;
    private $table_name_1 = "\"Race_heldAt\"";
    private $table_name_2 = "\"Stadium\"";

    public function __construct($db) {
        $this->database = $db;
    }

    function getStadiumInfo() {
        $query = "SELECT s.NAME, STADIUMADDR, RACE_TYPE, RACE_DATE FROM " . 
        $this->table_name_1 . " r, " . $this->table_name_2 . " s" . 
        " WHERE r.STADIUMADDR = s.ADDRESS";

        $stmt = $this->database->executePlainSQL($query);
        return $stmt;
    }
}
?>