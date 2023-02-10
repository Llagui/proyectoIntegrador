<?php
class Conexion extends mysqli
{
    private $host = "localhost";
    private $db = "roadrunner";
    private $user = "roadrunner";
    private $pass = "roadrunner";
    public function __construct()
    {
        try {
            parent::__construct($this->host, $this->user, $this->pass, $this->db);
        } catch (mysqli_sql_exception $e) {
            echo "ERROR: {$e->getMessage()}";
            // header("HTTP/1.1 400 Bad Request");
            exit;
        }
    }
}
