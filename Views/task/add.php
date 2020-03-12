<div class="content-wrapper">
    <div class="container" style="max-width: 40rem;">
        <div class="card mb-5 mt-5">
            <div class="card-header"><?= $title; ?></div>
            <div class="card-body">
                <form action="/task/add" method="post">
                    <div class="form-group">
                        <label>Название:</label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label>Ваше имя:</label>
                        <input class="form-control" type="text" name="author">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input class="form-control" type="text" name="email">
                    </div>
                    <div class="form-group">
                        <label>Описание:</label>
                        <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>
                    <input type="hidden" name="click" value="1">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    <a href="<?= $page; ?>" class="btn btn-info">Назад</a>
                </form>
            </div>
        </div>
    </div>
</div>