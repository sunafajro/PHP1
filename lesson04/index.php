<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Фотогалерея</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		.margin-top {
			margin-top: 20px;
		}
	</style>
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
				<?php 
				require_once('upload.php');
				$images = scandir('./img/small/');
				if(count($images) > 2) {
					$i = 1;
					$rows = ceil((count($images) - 2) / 3);
					foreach($images as $value) {
						if($value != '.' && $value != '..') { 
						    if($i % 3 == 1) { ?>
								<div class="row margin-top">
							<?php } ?>
								<div class="col-sm-4 text-center">
									<a href="#" data-toggle="modal" data-target="#modal_<?= $i ?>"><img src="./img/small/<?= $value ?>" alt="Фото" class="img-thumbnail"></a>
									<div class="modal fade" id="modal_<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="label_<?= $i ?>">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-body text-center">
											<img src="./img/orig/<?= $value ?>" alt="Фото" class="img-thumbnail">
										  </div>
										</div>
									  </div>
									</div>
								</div>
							<?php if($i % 3 == 0) { ?>
								</div>
							<?php } ?>
						<?php
							$i++;
						}
					}
				} else { ?>
					<div class="alert alert-warning" role="alert">В галерее нет ни одного фото!</div>
				<?php } ?>
			</div>
			<div class="col-sm-3">
				<h3>Загрузить файл:</h3>
				<form action="index.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="file" class="from-control" name="image" required>
						<p class="help-block">Файлы типа jpg, размером меньше 500 Кбайт.</p>
					</div>
					<input type="submit" class="btn btn-default">
				</form>
			</div>
		</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>