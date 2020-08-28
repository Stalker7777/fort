<div id="form_table_objects">
    <h1>Список объектов</h1>
    
    <div class="text-danger form-group">
        <?= $this->data['error_text'] ?>
    </div>

    <div id="table_objects">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Наименование</th>
                    <th class="text-center">Описание</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($this->data['rows'] as $item) { ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['note'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>