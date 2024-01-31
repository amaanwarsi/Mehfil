<?php

class DatabaseConnection {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        $this->connect();
    }

    private function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}

/*
// Example of how to use the class:

$database = new DatabaseConnection("localhost", "your_username", "your_password", "your_database");

// Get the connection object
$conn = $database->getConnection();

// Now you can use $conn to perform database operations
// For example:
$result = $conn->query("SELECT * FROM your_table");

// Remember to close the connection when you are done
$database->closeConnection();
*/

?>
