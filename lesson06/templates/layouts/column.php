<div class="col-sm-3">
    <h3>Загрузить файл:</h3>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" class="from-control" name="image" required>
            <p class="help-block">Файлы типа jpg, размером меньше 500 Кбайт.</p>
        </div>
        <input type="hidden" name="type" value="main-form">
        <input type="submit" class="btn btn-default">
    </form>
</div>