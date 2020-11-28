<!-- 2 Реализуйте класс Db, который обеспечивает реализацию следующих цепочек:

echo $db->table('user')->first(3);
выведет SELECT * FROM user WHERE id = 3

echo $db->table('product')->where('name', 'Alex')->andWhere('session', 123)->andWhere('id', 5)->get();
что должно вывести SELECT * FROM product WHERE name = Alex AND session = 123 AND id = 5

(конструктор запросов). -->

<?php

class Db {

    protected $tableName;
    protected $where = [];

    public function table($tableName) {
        $this->tableName = $tableName;
        return $this;
    }

    public function first($id) {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = {$id}";
        return $sql;
    }

    public function where($key, $value) {

        $count = count($this->where);

        if ($count != 0) {
            $this->where += [$key => $value];
        } else {
            $this->where[$key] = $value;
        }

        $sql = "SELECT * FROM {$this->tableName} WHERE ";

        foreach($this->where as $key => $value){
            $sqlWhere = "{$key} = {$value}";
        }

        $sql = $sql . $sqlWhere;
        return $sql;
    }
}

$db = new Db();

// echo $db->table('user')->first(3);


// echo $db->table('product')->where('name', 'Alex')->andWhere('session', 123)->andWhere('id', 5)->get();
echo $db->table('product')->where('name', 'Alex');