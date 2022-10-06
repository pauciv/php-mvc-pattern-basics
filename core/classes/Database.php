<?php

// Create connection
// instanciada en classes / Model.php

class Database
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $error;

    public function __construct()
    {
        // confing/db.php (donde están los defines)
        $this->host = HOST;
        $this->db = DB;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->charset = CHARSET;
    }

    // este método se ejecuta en el método get() de la class EmployeeModel
    function connect()
    {
        try {
            $connection = "mysql:host=" . HOST . ";"
                . "dbname=" . DB . ";"
                . "user=" . USER . ";"
                . "password=" . PASSWORD . ";"
                . "charset=" . CHARSET;

            $options = [
                PDO::ATTR_ERRMODE           =>  PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => FALSE,
            ];

            // connection to database
            $pdo = new PDO($connection, USER, PASSWORD, $options);
            return $pdo;

        } catch (PDOException $e) {
            require_once(VIEWS . "/error/error.php");
        }
    }
}
