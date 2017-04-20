<div class="col-sm-3">
    {{CART}}
    <h3>Добавить товар:</h3>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Наименование:</label>
            <input type="text" class="form-control input-sm" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label>Артикул:</label>
            <input type="text" class="form-control input-sm" name="articul" id="articul" required>
        </div>
        <div class="form-group">
            <label>Цена:</label>
            <input type="text" class="form-control input-sm" name="cost" id="cost" required>
        </div>
        <div class="form-group">
            <label>Количество:</label>
            <input type="text" class="form-control input-sm" name="count" id="count" required>
        </div>
        <div class="form-group">
            <label>Описание:</label>
            <textarea class="form-control input-sm" name="description" rows="6" id="description" required></textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="file" id="file">
            <p class="help-block">Файлы типа jpg, размером меньше 500 Кбайт.</p>
        </div>
        <input type="hidden" name="id" id="id" value="">
        <input type="hidden" name="r" id="r" value="{{UNIT}}/create">
        <input type="submit" class="btn btn-default">
    </form>
</div>