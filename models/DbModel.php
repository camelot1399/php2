<?php


namespace app\models;


use app\engine\Db;

abstract class DbModel extends Model
{
    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ["id" => $id], static::class);
    }

    public static function getLimit($page) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, :page";
        return Db::getInstance()->queryLimit($sql, $page);
    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);

    }

    public function insert() {

        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {
            $params[":{$key}"] = $this->$key;
            $columns[] = "`$key`";
        }

        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $tableName = static::getTableName();

        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ({$values})";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();

        echo $this->id;
    }

    public function update() {
        
        $tableName = static::getTableName();

        $sql = "UPDATE {$tableName} SET .... WHERE id = :id";
        // echo 'запустил update';
        var_dump($sql);
        //Db::getInstance()->execute($sql, $params);
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, [':id' => $this->id]);
    }

    public function save() {
        //TODO сделать фиксацию, чекнуть $this->id на null и вызвать insert или update
        if (is_null($this->id)) {
            echo 'insert';
            $this->insert();
        } else {
            echo 'update';
            $this->update();
        }
    }
}