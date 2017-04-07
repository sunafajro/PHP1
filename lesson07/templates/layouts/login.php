<form class="navbar-form navbar-right" method="post" action="./index.php">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Логин" name="username">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="Пароль" name="password">
    </div>
    <div class="form-group">
        <input type="hidden" name="r" value="site/login">
    </div>
    <button type="submit" class="btn btn-default">Войти</button>
</form>