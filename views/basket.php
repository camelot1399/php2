<h2>Корзина</h2>
<hr>

<div id="content">
    <?php if ($basket): ?>
        <?php foreach ($basket as $item): ?>
            <div id="item_<?=$item['basket_id']?>">
                <h2><?php echo $item['name']; ?></h2>
                <p>Описание: <?php echo $item['description']; ?></p>
                <p>Цена: <?php echo $item['basket_product_price']; ?> руб.</p>

                <button data-id="<?php echo $item['basket_id']; ?>" class="delete">Удалить</button>
            </div>
        <?php endforeach; ?>

        <form action="/order/add" method="POST">
        <h3>Формирование заказа:</h3>
            <label for="totalCountPrice">Общая цена: <span><?php echo $count; ?></span> руб.</label>
            <br>
            <br>
            <label for="userFirstName">Имя</label>
            <br>
            <input type="text" id="userFirstName" placeholder="Дмитрий" name="userFirstName" required>
            <br>

            <label for="userLastName">Фамилия</label>
            <br>
            <input type="text" id="userLastName" placeholder="Иванов" name="userLastName" required>
            <br>

            <label for="phone">Номер телефона</label>
            <br>
            <input type="tel" id="phone" placeholder="+79161111111" name="phone" required>
            <br>

            <label for="email">Почтовый ящик</label>
            <br>
            <input type="tel" id="email" name="email" required>
            <br>
            <br>
            <button id="createOrder" type="submit">Сформировать заказ</button>
        </form>
    <?php else: ?>
        <div>Корзина пуста</div>
    <?php endif; ?>
</div>


    


<script>

let buttons = document.querySelectorAll('.delete');
buttons.forEach(el => {
    el.addEventListener('click', el => {
        let id = el.target.dataset.id;
        let block = document.getElementById('item_' + id);

        (
            async () => {
                const response = await fetch('/basket/del/', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json;charset=utf-8'},
                    body: JSON.stringify({
                        id: id
                    })
                });
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
                block.remove();

                let buttons = document.querySelectorAll('.delete');
                let content = document.querySelector('#content');

                if (buttons.length === 0) {
                    content.innerText = 'Корзина пуста';
                }

            }
        )();

    })

})

</script>