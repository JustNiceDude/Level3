<?php


namespace application\core;

use PDO;

class DB
{

    public $db;

    /*
     * DB constructor.
     */
    public function __construct()
    {
        require_once 'application/configurations/db_connection.php';
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    /*
     * Forms query with params to MySQL DB
     *
     * @return result of query
     */
    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':' . $key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    /*
     * Gets all fields of row from table in DB
     */
    public function row($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
    * Gets column from table in DB
    */
    public function column($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
}