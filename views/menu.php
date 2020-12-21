<?if ($auth):?>
    Добро пожаловать <?=$username?>
    <button><a href="/auth/logout/">Выход</a></button>
<?else:?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="pass" placeholder="Пароль">
        <br>
        <input type="checkbox" id="rememberMe" name="rememberMe">
        <label for="rememberMe">Запомнить меня</label>
        <br>
        
        <input type="submit" name="submit" value="Войти">
    </form>
<?endif;?>
<br>

<a href="/">Главная</a>
<a href="/product/catalog">Каталог</a>
<a href="/basket">Корзина (<span id="count"><?=$count?></span>)</a>
<a href="/order">Мои заказы</a>
<br>
