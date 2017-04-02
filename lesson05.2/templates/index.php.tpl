<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Фотогалерея</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../../style.css" rel="stylesheet">
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
		<div classs="row">
			<div class="col-sm-12">
				<h1>Фотогалерея</h1>
			</div>
		</div>
		<div classs="row">
			<div class="col-sm-9">
				{{MESSAGE}}
				{{GALLERY}}
			</div>
			<div class="col-sm-3">
				<h3>Загрузить файл:</h3>
				<form action="./index.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="file" class="from-control" name="image" required>
						<p class="help-block">Файлы типа jpg, размером меньше 500 Кбайт.</p>
					</div>
					<input type="hidden" name="type" value="main-form">
					<input type="submit" class="btn btn-default">
				</form>
			</div>
		</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
	    $('.modal-link').click(
			function() {
				id = $(this).attr('id');
				$.ajax({
					method: 'POST', 
					data: 'type=ajax&id=' + id, 
					url: './index.php', 
					success: function(response) {
						var items = $.parseJSON(response);
						$('#views_'+items.id).text(items.views);
					}
				});
				
			}
		);
	</script>
	</body>
</html>