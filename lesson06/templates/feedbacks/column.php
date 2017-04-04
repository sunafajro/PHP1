<div class="col-sm-3">
    <h3>Оставить отзыв:</h3>
    <form action="index.php?r=feedbacks/create" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Ваше имя:</label>
            <input type="text" class="form-control input-sm" name="name" required>
        </div>
        <div class="form-group">
            <label>E-mail:</label>
            <input type="email" class="form-control input-sm" name="email" required>
        </div>
        <div class="form-group">
            <label>Тема:</label>
            <input type="text" class="form-control input-sm" name="title" required>
        </div>
        <div class="form-group">
            <label>Отзыв:</label>
            <textarea class="form-control input-sm" name="body" rows="6" required></textarea>
        </div>
        <input type="hidden" name="type" value="main-form">
        <input type="submit" class="btn btn-default">
    </form>
</div>