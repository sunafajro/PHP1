<div class="panel panel-default">
    <div class="panel-heading">
        <b>{{DATE}}</b> 
        <a class="pull-right btn btn-default btn-xs" href="./index.php?r=feedbacks/delete&id={{ID}}" title="Удалить отзыв"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> 
        <a id="{{ID}}" class="pull-right edit-links btn btn-default btn-xs" title="Изменить отзыв"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></div>
    <div class="panel-body">
        <p><b>Имя отправителя:</b><br/>
        <em>{{NAME}}</em></p>
        <p><b>E-mail отправителя:</b><br/>
        <em>{{EMAIL}}</em></p>
        <p><b>Тема отзыва:</b><br/>
        <em>{{TITLE}}</em></p>
        <p><b>Текст отзыва:</b><br/>
        <em>{{BODY}}</em></p>
    </div>
</div>