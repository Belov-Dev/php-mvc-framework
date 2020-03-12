<div class="container">
    <div class="card text-white bg-dark mb-3 mt-5 mx-auto" style="max-width: 18rem;">
        <div class="card-header">Авторизация</div>
        <div class="card-body">
            <form action="/login" method="post">
                <div class="form-group">
                    <label>Логин</label>
                    <input class="form-control" type="text" name="login">
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <button type="submit" class="btn btn-outline-success btn-block">Войти</button>
            </form>
        </div>
    </div>
</div>