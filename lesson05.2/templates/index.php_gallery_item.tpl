<div class="col-sm-4 text-center">
    <a href="#" id="{{ID}}" class="modal-link" data-toggle="modal" data-target="#modal_{{ID}}"><img src="{{IMG_THUMB_PATH}}" alt="{{IMG_NAME}}" class="img-thumbnail"></a>
	<p class="text-center">{{IMG_NAME}} <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <span id="views_{{ID}}">{{IMG_VIEW_CNT}}</span></p>
	<div class="modal fade" id="modal_{{ID}}" tabindex="-1" role="dialog" aria-labelledby="label_{{ID}}">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-body text-center">
				<img src="{{IMG_ORIG_PATH}}" alt="{{IMG_NAME}}" class="img-thumbnail">
			  </div>
			</div>
		</div>
	</div>
</div>