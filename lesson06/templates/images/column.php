<div class="col-sm-3">
    <h3>Загрузить файл:</h3>
    <form action="index.php?r=images/create" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" class="form-control" name="file" id="file" required>
            <p class="help-block">Файлы типа jpg, размером меньше 500 Кбайт.</p>
        </div>
        <input type="hidden" name="id" id="id" value="">
        <input type="hidden" name="r" id="r" value="images/create">
        <input type="submit" class="btn btn-default">
    </form>
</div>