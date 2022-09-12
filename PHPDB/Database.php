<?php     
    
  class Database {
        // DB params
        private $host = 'localhost';
        private $db_name = 'ass1';
        private $username = 'root';
        private $password = '';
        private $conn;

        //Connect
        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO('mysql:host=' .$this->host . ';dbname=' .$this->db_name, $this->username, $this->password);
                
                //$this->conn->setattribute(PDO::attr_errmode, PDO::errmode_exception);

            } catch(PDOException $e) {
                echo 'connection error' .$e->getMessage();
            }

            return $this->conn;
        }
    } 

