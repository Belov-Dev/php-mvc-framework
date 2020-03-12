<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <link href="/public/css/bootstrap.css" rel="stylesheet">
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/form.js"></script>
</head>
<header>
    <div class="container mt-2">
        <div class="text-right">
            <a class="btn btn-outline-info m-1" href="/task/add">Добавить задачу</a>
            <a class="btn btn-outline-info m-1" href="/task">Задачи</a>
            <a class="btn btn-outline-warning m-1" href="/">X</a>
        </div>
    </div>
</header>
<body class="fixed-nav sticky-footer bg-dark">
<?php echo $content; ?>
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>© 2020 Andrey Belov</small>
        </div>
    </div>
</footer>
</body>
</html>