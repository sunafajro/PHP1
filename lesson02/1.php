<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Задание 1</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="../style.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
    <p><a href="index.php">Назад</a></p>
    <p><b>Описание и код задания:</b></p>
    <pre>
    <code>
        /* 
        *  задание 1 
        *  Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. 
        *  Затем написать скрипт, который работает по следующему принципу:
        *    если $a и $b положительные, вывести их разность;</li>
        *    если $а и $b отрицательные, вывести их произведение;</li>
        *    если $а и $b разных знаков, вывести их сумму;</li>
        *    ноль можно считать положительным числом.</li>
        */
            
        if($a >= 0 && $b >= 0) {
            $result = $a - $b;
        } else if($a < 0 && $b < 0) {
            $result = $a * $b;
        } else {
            $result = $a + $b;
        }
    </code>
    </pre>
    
    
    <p><b>Результат:</b></p>
        <?php

        $a = NULL;
        $b = NULL;
        $result = NULL;
        
        if(isset($_POST['a']) && isset($_POST['b'])) {
            $a = (int)$_POST['a'];
            $b = (int)$_POST['b'];
            
            /*  если обе переменные положительные */
            if($a >= 0 && $b >= 0) {
                $result = $a - $b;
            }
            /* если обе переменные отрицательные */
            else if($a < 0 && $b < 0) {
                $result = $a * $b;
            } /* если переменные с разным знаком */
            else {
                $result = $a + $b;
            }
        }
        ?>
        
        <form method="post" action="./1.php">
		    <div class="form-group">
				<input type="text" value="<?= $a ?>" name="a" class="form-control" placeholder="Введите первое число" required>
			</div>
			<div class="form-group">
				<input type="text" value="<?= $b ?>" name="b" class="form-control" placeholder="Введите второе число" required>
			</div>
            <input type="submit" class="btn btn-default">
        </form>
        <?php if($result !== NULL): ?>
		<div class="well margin-top">                
            <samp><?= $result ?></samp>         
        </div>
		<?php endif ?>
    </body>
</html>