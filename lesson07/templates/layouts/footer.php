            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript">
        /* блок получения данных для редактирования элементов */
	    $('.edit-links').click(
	    	function() {
		    	var id = $(this).attr('id');
				$.ajax({
					method: 'POST', 
					data: 'r={{UNIT}}/getitem&id=' + id, 
					url: './index.php', 
					success: function(response) {
						var items = $.parseJSON(response);
						$.each(items, function(key, value) {
						    $('#' + key).val(value);
						});
						$('#r').val('{{UNIT}}/update');
					}
				});
			}
		);
		/* блок добавления товаров в корзину */
		$('.btn-add-buy').click(
			function() {
				var pid = $(this).attr('id').split('-');
				$.ajax({
					method: 'POST', 
					data: 'r={{UNIT}}/addbuy&pid=' + pid[1], 
					url: './index.php', 
					success: function(cnt) {
						$('#cart_items_count').text(cnt);
						$('#cart-block').removeClass('hidden');
					}
				});
			}
		);
		/* блок добавления товаров в корзину */
		$('.btn-del-buy').click(
			function() {
				var pid = $(this).attr('id').split('-');
				$.ajax({
					method: 'POST', 
					data: 'r={{UNIT}}/delbuy&pid=' + pid[1], 
					url: './index.php', 
					success: function(cnt) {
						if(cnt == 0) {
							$('#cart-block').addClass('hidden');
						} else {
							$('#cart_items_count').text(cnt);
						}
						$('#product-' + pid[1]).addClass('hidden');
					}
				});
			}
		);
	</script>
	</body>
</html>