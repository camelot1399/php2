<?if ($auth):?>
    Добро пожаловать <?=$username?>
    <button type="button" class="btn btn-danger"><a href="/auth/logout/">Выход</a></button>

    <?php if ($username == 'admin') {
        echo '<a href="/adminka">Админка</a>';
    } ?>
        

<?else:?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="pass" placeholder="Пароль">
        <br>
        <input type="checkbox" id="rememberMe" name="rememberMe">
        <label for="rememberMe">Запомнить меня</label>
        <br>
        
        <!-- <input type="submit" name="submit" value="Войти"> -->
        <button type="submit" name="submit" value="Войти" class="btn btn-success">Войти</button>
    </form>
<?endif;?>
<br>

<a href="/">Главная</a>
<a href="/product/catalog">Каталог</a>
<a href="/basket">Корзина (<span id="count"><?=$count?></span>)</a>
<a href="/order">Мои заказы</a>

<br>
