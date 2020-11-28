
<!-- 1. Придумать класс, который описывает любую сущность из 
предметной области интернет-магазинов: продукт, ценник, посылка 
и т.п. или любой другой области. Опишите свойства и методы, 
придумайте наследника, расширяющего функционал родителя. 
Приведите пример использования. -->
<?php

class Basket {
    public $name = 'Корзина';
    public $list = [];  

    public function info() {
        echo '<br> Прорверяем корзину <br>';
        if ($this->list) {
            echo 'В корзине есть товар <br>';
        } else {
            echo 'Товар отсутствует в корзине <br>';
        }
        var_dump($this->list);
    }

    public function clear() {
        return $this->list = [];
    }
}
class Product {
    public $category;
    public $groupe;
    public $model;
    public $color;

    public function __construct($category = null, $groupe = null, $model = null, $color = null) {
        $this->category = $category;
        $this->groupe = $groupe;
        $this->model = $model;
        $this->color = $color;
    }

    public function say() {
        echo "Категория: {$this->category} <br>";
        echo "Группа: {$this->groupe} <br>";
        echo "Модель: {$this->model} <br>";
        echo "Цвет: {$this->color} <br>";
        
    }
}
class Model extends Product {

    public $model;
    public $color;
    public $size;

    public function __construct($category = null, $groupe = null, $model = null, $color = null, $size = null) {
        parent::__construct($category, $groupe, $model, $color);
        $this->size = $size;
    }

    public function say() {
        parent::say();
        echo "Размер: {$this->size} <br>";
    }

    public function addBasket(Basket $item) {
        $item->list[] = $this->model;
        echo "<br> {$this->model} положили в {$item->name} <br>";
    }

    public function removeBasket(Basket $item) {
        $item->list[] -= $this->model;
        echo "<br> {$this->model} убрали из {$item->name} <br>";
    }
    
}

// создаем
$iphone  = new Model('Техника', 'Телефон', 'Iphone', ' Красный', 'XXL');
$iphone2 = new Model('Техника', 'Телефон', 'Iphone 6c', ' Черный', 'M');
$iphone3 = new Model('Техника', 'Телефон', 'Iphone 11 pro MAX', ' Черный', 'L');
$siemens = new Model('Техника', 'Телефон', 'Siemens 25d', ' Черный', 'XL');
$basket  = new Basket();

$iphone->say();
echo '<br>';
$iphone2->say();
echo '<br>';

$basket->info();

// добавляем товары в корзину
$iphone->addBasket($basket);
$iphone2->addBasket($basket);
$iphone3->addBasket($basket);
$siemens->addBasket($basket);

$basket->info();

// убираем товар из корзины
$iphone->removeBasket($basket);
$basket->info();


//очистка корзины
echo '<br> Очищаем корзину';
$basket->clear();
$basket->info();