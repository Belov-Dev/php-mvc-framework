<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card-text">
            <?php if (empty($list)): ?>
                <p>Список задач пуст</p>
            <?php endif; ?>
            <?php $sort = ($_GET['sort'] ?? $sortBy) == 'asc' ? 'desc' : 'asc'; ?>
            <table class="table table-hover .table-responsive">
                <thead class="bg-white font-weight-bold">
                <tr>
                    <?php if (isset($_SESSION['admin'])): ?>
                        <td role="columnheader" aria-sort="ascending" style="width: 10%"><b>Название</b></td>
                        <td style="width: 35%; text-align: center">Задача</td>
                        <td style="width: 10%"><a style="color: black;"
                                                  href="?order_by=author&sort=<?= $sort ?>">Автор</a></td>
                        <td style="width: 15%"><a style="color: black;"
                                                  href="?order_by=email&sort=<?= $sort ?>">Email</a></td>
                        <td style="width: 15%"><a style="color: black;"
                                                  href="?order_by=status&sort=<?= $sort ?>">Статус</a></td>
                        <td style="width: 15%">Редактировать</td>
                    <?php else: ?>
                        <td role="columnheader" aria-sort="ascending" style="width: 10%">Название</td>
                        <td style="width: 50%; text-align: center">Задача</td>
                        <td style="width: 10%"><a style="color: black;"
                                                  href="?order_by=author&sort=<?= $sort ?>">Автор</a></td>
                        <td style="width: 15%"><a style="color: black;"
                                                  href="?order_by=email&sort=<?= $sort ?>">Email</a></td>
                        <td style="width: 15%"><a style="color: black;"
                                                  href="?order_by=status&sort=<?= $sort ?>">Статус</a></td>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($list as $val): ?>
                    <tr>
                        <td><?= htmlspecialchars($val['title'], ENT_QUOTES); ?></td>
                        <td style="height: 100px"><div class="size"><?= htmlspecialchars($val['description'], ENT_QUOTES); ?></div></td>
                        <td><?= htmlspecialchars($val['author'], ENT_QUOTES); ?></td>
                        <td><?= htmlspecialchars($val['email'], ENT_QUOTES); ?></td>
                        <td><?php if (!empty($val['status'])): ?>
                                <h6 style="color:green">Выполнено</h6>
                            <?php endif; ?>
                            <?php if ($val['is_edit_description'] == 1): ?>
                                <i style="font-size: 8pt">Отредактировано администратором: <br/>
                                    <?= htmlspecialchars($val['created_at'], ENT_QUOTES); ?></i>
                            <?php endif; ?></td>
                        <?php if (isset($_SESSION['admin'])): ?>
                            <td><a href="/task/edit/<?= $val['id']; ?>"
                                   class="btn btn-dark">Редактировать</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <hr>
            <?= $pagination; ?>
        </div>
    </div>
</div>