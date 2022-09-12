<?php
    require PASSWORD_BCRYPT;

    class user {
        //DB
        private $conn;
        private $table = 'users';

        // Uproperties

        public $id;
        public $username;
        public $password;


        // con with DB

        public function __construct($db) {
            $this->conn = $db;
        }

        public function create($username, $password) {
            $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
            $query = $this->conn->prepare('INSERT INTO ' . $this->table . '(username,  password) VALUE (?,?)');
            $query->bindParam(1, $username);
            $query->bindParam(2, $hashedpassword);
            $query->execute();
        }

        public function login($username, $password) {
            $query = $this->conn->prepare('SELECT * FROM users WHERE username=?');
            $query->bindParam(1, trim($username));
            $query->execute();

            // PDO::FETCH_ASSOC
            echo $query->fetch();
        }
    }