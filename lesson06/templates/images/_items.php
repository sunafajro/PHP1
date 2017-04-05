
<p class="text-center"><b>{{IMG_NAME}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="./index.php?r=images/delete&id={{ID}}" class="btn btn-danger btn-xs" title="Удалить фото" onclick="return confirm('Вы уверены?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></p>
<a href="./index.php?r=images/view&id={{ID}}"><img id="image_{{ID}}" src="{{IMG_THUMB_PATH}}" alt="{{IMG_NAME}}" class="img-thumbnail"></a>
<p class="text-center">
<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <span id="views_{{ID}}">{{IMG_VIEW_CNT}}</span></p>
</p>
