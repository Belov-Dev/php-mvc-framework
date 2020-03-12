<div class="content-wrapper">
    <div class="container" style="max-width: 40rem;">
        <div class="card mb-5 mt-5">
            <div class="card-header"><?= $title; ?></div>
            <div class="card-body">
                <form action="/task/edit/<?= $data[0]['id']; ?>" method="post">
                    <div class="form-group">
                        <label>Название:</label>
                        <input class="form-control" type="text"
                               value="<?= htmlspecialchars($data[0]['title'], ENT_QUOTES); ?>"
                               name="title">
                    </div>
                    <div class="form-group">
                        <label>Ваше имя:</label>
                        <input class="form-control" type="text"
                               value="<?= htmlspecialchars($data[0]['author'], ENT_QUOTES); ?>"
                               name="author">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input class="form-control" type="text"
                               value="<?= htmlspecialchars($data[0]['email'], ENT_QUOTES); ?>"
                               name="email">
                    </div>
                    <div class="form-group">
                        <label>Описание:</label>
                        <textarea class="form-control" rows="3"
                                  name="description"><?= htmlspecialchars($data[0]['description'], ENT_QUOTES); ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <input type="hidden" name="status" value="1">
                            <?php if ($data[0]['status'] == 1): ?>
                                <input type="checkbox" name="status" value="1" checked>
                            <?php else: ?>
                                <input type="checkbox" name="status" value="1">
                            <?php endif; ?>
                            <label>Выполнено</label>
                        </div>
                    </div>
                    <input type="hidden" name="click" value="1">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <a href="<?= $page; ?>" class="btn btn-info">Назад</a>
                    <a href="/task/delete/<?= $data[0]['id']; ?>" class="btn btn-danger">Удалить</a>
                </form>
            </div>
        </div>
    </div>
</div>