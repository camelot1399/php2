<h1>Админка</h1>

<h2>Список всех ордеров</h2>

<table class="table table-striped"> 
    <thead>
        <tr>
            <td>id</td>
            <td>product_price</td>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>phone</td>
            <td>email</td>
            <td>status</td>
        </tr>
    </thead>

    <tbody>
       
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?=$order['id']?></td>
            <td><?=$order['product_price']?></td>
            <td><?=$order['userFirstName']?></td>
            <td><?=$order['userLastName']?></td>
            <td><?=$order['phone']?></td>
            <td><?=$order['email']?></td>
            <td><?=$order['status']?></td>
        </tr>
        <?php endforeach ?>
       
    </tbody>
</table>