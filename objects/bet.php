<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
class Bet {
    private $database;
    private $table_name_1 = "Place_bets_on";
    private $table_name_2 = "Horse_ridden_by";

    public function __construct($db) {
        $this->database = $db;
    }

    public $accountID;

    function getBetInfo() {
        $query = "SELECT BETID, p.HORSEID, NICKNAME, ACCOUNTID, AMOUNT, BET_DATE, BET_TYPE FROM " . 
        $this->table_name_1 . " p, " . $this->table_name_2 . " h" . 
        " WHERE p.ACCOUNTID = " . $this->accountID . " AND " . 
        "p.HORSEID=h.HORSEID";
        $stmt = $this->database->executePlainSQL($query);
        return $stmt;
    }
}
?>