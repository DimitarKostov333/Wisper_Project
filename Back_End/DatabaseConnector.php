<?php

require_once 'CustomerModel.php';

class DatabaseConnector {
    private $host = 'mysql';
    private $db = 'customer_db';
    private $user = 'appuser';
    private $pass = 'apppass';
    private $charset = 'utf8mb4';

    private static $instance = null;
    private $pdo;

    private function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            throw new RuntimeException('Database connection failed: ' . $e->getMessage());
        }
    }

    public static function getInstance(): DatabaseConnector {
        if (self::$instance === null) {
            self::$instance = new DatabaseConnector();
        }
        return self::$instance;
    }

    public function getCustomers(): array {
        $stmt = $this->pdo->query("
            SELECT c.*, s.status_name 
            FROM customers c 
            JOIN customer_status s ON c.status_id = s.id
        ");
        
        $customers = [];

        while ($row = $stmt->fetch()) {
            $customers[] = new CustomerModel(
                $row['first_name'],
                $row['last_name'],
                $row['phone'],
                $row['email_address'],
                $row['address_line_one'],
                $row['address_line_two'],
                $row['city'],
                $row['state'],
                $row['zip'],
                $row['status_name']
            );
        }

        return $customers;
    }

    public function __destruct() {
        $this->pdo = null;
    }
}