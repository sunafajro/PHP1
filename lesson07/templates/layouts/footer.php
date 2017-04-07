            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript">
	    $('.edit-links').click(
	    	function() {
		    	var id = $(this).attr('id');
				$.ajax({
					method: 'POST', 
					data: 'r=feedbacks/getitem&id=' + id, 
					url: './index.php', 
					success: function(response) {
						var items = $.parseJSON(response);
						$('#name').val(items.name);
						$('#email').val(items.email);
						$('#title').val(items.title);
						$('#body').val(items.body);
						$('#id').val(items.id);
						$('#r').val('feedbacks/update');
					}
				});
			}
		);
	</script>
	</body>
</html>