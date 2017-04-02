<?php
    $message = 'В галерее нет ни одного фото!';
	$db = NULL;
    /* подключаемся к базе */
	require_once('./db.php');
	if($_POST) {
		/* если пришли данные для загрузки файла отрабатываем upload-file.php */ 
		if(isset($_POST['type']) && $_POST['type'] == 'main-form') {
			require_once('./upload-file.php');
			header('Location: ./index.php');
			exit;
		}
		/* если пришли данные обновления колич. просмотров отрабатываем update-views.php */		
		elseif(isset($_POST['type']) && isset($_POST['id']) && $_POST['type'] == 'ajax' ) {
			$img_id = (int)$_POST['id'];
			require_once('./update-views.php');
			$data = ['id' => $img_id, 'views' => $response];
			echo json_encode($data);
			exit;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Фотогалерея</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../style.css" rel="stylesheet">
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
				<?php	
				/* получаем список дахх для вывода фотографий в галерею */
				if($db) {
                    $query = $db->query("SELECT COUNT(*) as cnt FROM images");
                    $img_cnt = $query->fetch();
                    $query = $db->query("SELECT * FROM images ORDER BY img_view_cnt DESC");
                    $images = $query->fetchAll();

					if($img_cnt['cnt'] > 0) {
						$i = 1;
						$rows = ceil($img_cnt['cnt'] / 3);
						foreach($images as $image) { ?>
								<?php if($i % 3 == 1): ?>
									<div class="row margin-top">
								<?php endif ?>
									<div class="col-sm-4 text-center">
										<a href="#" id="<?= $image['id'] ?>" class="modal-link" data-toggle="modal" data-target="#modal_<?= $i ?>"><img src="<?= $image['img_thumb_path'] ?>" alt="<?= $image['img_name'] ?>" class="img-thumbnail"></a>
										<p class="text-center"><?= $image['img_name'] ?> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <span id="views_<?= $image['id'] ?>"><?= $image['img_view_cnt'] ?></span></p>
										<div class="modal fade" id="modal_<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="label_<?= $i ?>">
										  <div class="modal-dialog" role="document">
											<div class="modal-content">
											  <div class="modal-body text-center">
												<img src="<?= $image['img_orig_path'] ?>" alt="<?= $image['img_name'] ?>" class="img-thumbnail">
											  </div>
											</div>
										  </div>
										</div>
									</div>
								<?php if($i % 3 == 0): ?>
									</div>
								<?php endif ?>
							<?php $i++; ?>
						<?php } ?>
						<?php if($img_cnt['cnt'] % 3) { ?>
							</div>
						<?php } ?>
					<?php } ?>
				<?php } else { ?>
					<div class="alert alert-warning" role="alert"><?= $message ?></div>
				<?php } ?>
			</div>
			<div class="col-sm-3">
				<h3>Загрузить файл:</h3>
				<form action="index.php" method="post" enctype="multipart/form-data">
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