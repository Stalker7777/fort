<div id="form_create">
    <h1>Создать объект</h1>

    <div class="text-danger form-group">
        <?= $this->data['error_text'] ?>
    </div>

    <form action="index.php?page=create" method="post">
        <div class="form-group">
            <label>Наименование <span class="text-danger">*</span></label>
            <input class="form-control" name="name" type="text" value="<?= $this->data['name'] ?>">
        </div>
        <div class="form-group">
            <label>Описание <span class="text-danger">*</span></label>
            <textarea class="form-control" name="note" rows="4" cols="50"><?= $this->data['note'] ?></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Сохранить" class="btn btn-success">
            <a href="index.php" class="btn btn-primary">Отмена</a>
        </div>
    </form>
</div>
