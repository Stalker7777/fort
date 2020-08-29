<div id="form_table_objects">
    <h1>Список объектов</h1>

    <div class="form-group">
        <a href="index.php?page=create" class="btn btn-success">Создать</a>
    </div>

    <div class="text-danger form-group">
        <?= $this->data['error_text'] ?>
    </div>

    <form action="index.php?page=select" method="post">
        <div class="row">
            <div class="form-group col-md-6">
                <label>Наименование</label>
                <input class="form-control" name="find_name" type="text" value="<?= $this->data['find_name'] ?>">
            </div>
            <div class="form-group col-md-6">
                <label>Описание</span></label>
                <input class="form-control" name="find_note" type="text" value="<?= $this->data['find_note'] ?>">
            </div>
        </div>
        <div class="form-group text-right">
            <input type="submit" name="submit" value="Найти" class="btn btn-success">
            <a href="index.php" class="btn btn-primary">Отмена</a>
        </div>
    </form>

    <div id="table_objects">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Наименование</th>
                    <th class="text-center">Описание</th>
                    <th class="text-center">Действия</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($this->data['rows'] as $item) { ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['note'] ?></td>
                    <td class="text-center">
                        <a href="index.php?page=delete&id=<?= $item['id'] ?>" class="btn btn-outline-primary" onClick="return window.confirm('Удалить запись?');">
                            <span class="glyphicon glyphicon-trash">Удалить</span>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>