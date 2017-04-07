<div class="panel panel-default">
    <div class="panel-heading">
        <a href="./index.php?r=feedbacks/view&id={{ID}}">{{TITLE}}</a> 
        <a class="pull-right btn btn-danger btn-xs" href="./index.php?r=feedbacks/delete&id={{ID}}" title="Удалить отзыв" onclick="return confirm('Вы уверены?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> 
        <a id="{{ID}}" class="pull-right edit-links btn btn-info btn-xs" title="Изменить отзыв"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></div>
    <div class="panel-body">
        <p>{{BODY}}</p>
        <p class="text-right small"><em>{{NAME}}</em></p>
    </div>
</div>