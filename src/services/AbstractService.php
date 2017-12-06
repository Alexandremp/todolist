<?php

class AbstractService
{

    const USER_SESSION_ID = "user_id";

    /**
     * @return \PDO
     */
    protected function getDatabaseConnection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tododb";

        $conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    protected function getUserId() {
        return $_SESSION[self::USER_SESSION_ID];
    }
}