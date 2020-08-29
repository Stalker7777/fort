<div id="form_table_objects">
    <h1>Список объектов</h1>

    <div class="form-group">
        <a href="index.php?page=create" class="btn btn-success">Создать</a>
    </div>

    <div class="text-danger form-group">
        <?= $this->data['error_text'] ?>
    </div>

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