<?php
    class DB {
        private $host = 'localhost';
        private $db_name = 'webtechw10';
        private $username = 'root';
        private $password = '';

        public function connect() {
            $dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=utf8mb4";

            try {
                $connection = new PDO($dsn, $this->username, $this->password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connection;
            } catch (PDOException $e) {
                http_response_code(500);
                exit('Failed to connect to database: ' . $e->getMessage());
            }
        }
    }

    $db = new DB();
    $connection = $db->connect();
?>
