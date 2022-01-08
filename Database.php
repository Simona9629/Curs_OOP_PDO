<?php

require_once 'config/db_config.php';

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbName = DB_NAME;
    private $connection;
    private $error;
    private $statement;
    
    public function __construct()
    {
        $dsn = 'mysql:host='. $this->host . ';dbname='. $this->dbName;
        try {
            $this->connection = new PDO($dsn, $this->user, $this->pass);
        } catch (PDOException $ex) {
            $this->error = $ex->getMessage();
        }
        
    }
    public function getError() {
        return $this->error;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    public function prepareStatement($query)
    {
        $this->statement = $this->connection->prepare($query);
    }
    
    public function execute()
    {
        return $this->statement->execute();
    }
    
    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
    
    public function bind($param, $valoare, $type = null)
    {
        if (is_null($type)) {
            if (is_int($valoare)) {
                $type = PDO::PARAM_INT;
            } elseif (is_bool($valoare)) {
                $type = PDO::PARAM_BOOL;
            } elseif (is_null($valoare)) {
                $type = PDO::PARAM_NULL;
            } else {
                $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $valoare, $type);
        
    }




}
