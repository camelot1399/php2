<h2>Корзина</h2>

<?php var_dump($basket); ?>
<?php foreach ($basket as $item):?>
<h3><a href="/?c=product&a=card&id=<?=$item['id']?>"><?=$item['name']?></a></h3>
<p><?=$item['description']?></p>
<p><?=$item['price']?></p>
<button>Удалить</button>
<hr>
<?php endforeach;?>