<h2>Мои заказы</h2>
<hr>

<?php if ($order): ?>
    <div>Имя: <?= $order['userFirstName']?></div>
    <div>Фамилия: <?= $order['userLastName']?></div>
    <div>Номер телефона: <?= $order['phone']?></div>
    <div>Почта: <?= $order['email']?></div>

    <div>Общая сумма заказа: <span><?=$price?></span> руб.</div>


    <?php foreach ($catalog as $item): ?>
        <h3><a href="/product/card/?id=<?= $item['id'] ?>"><?= $item['name'] ?></a></h3>
        <p><?= $item['description'] ?></p>
        <p><?= $item['price'] ?></p>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <div>Корзина пуста</div>

<?php endif ?>

