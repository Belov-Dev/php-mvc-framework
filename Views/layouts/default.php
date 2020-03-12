<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/form.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <link rel="stylesheet" href="/public/css/bootstrap-grid.css">
    <title><?= $title; ?></title>
    <style>
        .size {
            overflow: scroll; /* Обрезаем содержимое */
            height: 50px;
            text-overflow: ellipsis; /* Многоточие */
        }
        .size:hover {
            white-space: normal; /* Обычный перенос текста */
            height: max-content;
        }
    </style>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse"">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="/" class="btn btn-outline-light mr-3">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $page; ?>" class="btn btn-outline-light mr-3">Добавить задачу</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-right">
                    <li class="nav-item">
                        <?php if (isset($_SESSION['admin']) || isset($_SESSION['user'])): ?>
                            <a href="/logout">
                                <span class="btn btn-outline-light">Выйти</span>
                            </a>
                        <?php else: ?>
                            <a href="/login">
                                <span class="btn btn-outline-light">Логин</span>
                            </a>
                        <?php endif ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="text-right">
        <div class="mb-3 mt-3 mr-3 text-right">
            <div class="text-center"><h3>Задачник</h3></div>
        </div>
    </div>
</header>
<body>
<?= $content; ?>
</body>
<footer>
    <div class="card-footer">
        <p>© 2020 Andrey Belov</p>
    </div>
</footer>
</html>