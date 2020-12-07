<?php

namespace app\engine;

class Db
{

    protected $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => 'root',
        'database' => 'shop',
        'charset' => 'utf8',
        'port' => '8889'
    ];

    // use TSingletone;

    protected static $instance = null;

    public static function getInstance() {
        
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    // protected function __construct() {}
    // protected function __clone() {}
    // protected function __wakeup() {}

    protected $connection = null;

    public function getConnection() {
        if (is_null($this->connection)) {
            // $this->connection = mysqli_connect();
            $this->connection = new \PDO($this->prepareDsnString(), 
                $this->config['login'], 
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        
        return $this->connection;
    }

    protected function prepareDsnString() {
        return sprintf('%s:host=%s;dbname=%s;charset=%s', 
        $this->config['driver'],
        $this->config['host'],
        $this->config['database'],
        $this->config['charset']
        );
    }

    protected function query($sql, $params) {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function queryObject($sql, $params = [], $class) {
        $stmt = $this->query($sql, $params);
        $stmt = setFetchMode(\PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    public function execute($sql, $params = []) {
        return $this->query($sql, $params)->rowCount();
    }

    public function lastInsertId($sql) {
        //TODO верните последний ID
        return $this->queryOne($sql)->fetch();
    }

    public function queryOne($sql, $params = []) {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $params = []) {
        //выполнить $sql
        return $this->query($sql, $params)->fetchAll();
    }

    

}