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
		$('.btn-buy').click(
			function() {
				var pid = $(this).attr('id').split('-');
				$.ajax({
					method: 'POST', 
					data: 'r={{UNIT}}/addtocart&pid=' + pid[1], 
					url: './index.php', 
					success: function(cnt) {
						$('#cart_items_count').text(cnt);
						$('#cart-block').removeClass('hidden');
					}
				});
			}
		);
	</script>
	</body>
</html>