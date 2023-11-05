<?php

require_once 'config.php';

class Database {
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;

    public function __construct()
    {
        $this->db_host = DB_HOST;
        $this->db_name = DB_NAME;
        $this->db_user = DB_USER;
        $this->db_pass = DB_PASS;
    }

    public function connect() {
        try{
            $conn = new PDO(
                "pgsql:host=$this->db_host;port=5432;dbname=$this->db_name",
                $this->db_user,
                $this->db_pass
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $conn;
        
        } catch(PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}