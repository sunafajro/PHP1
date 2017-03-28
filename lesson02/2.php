<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Задание 2</title>
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
            *  задание 2 
            *  Присвоить переменной $а значение в промежутке [0..15].  
            *  С помощью оператора switch организовать вывод чисел от $a до 15.
            */
            
            $a = rand(0, 15);

            switch($a) {
                case 0: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 1: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 2: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 3: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 4: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 5: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 6: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 7: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 8: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 9: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 10: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 11: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 12: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 13: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 14: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
                case 15: echo '&lt;p&gt;' . $a . '&lt;/p&gt;'; $a++;
            }
        </code>
        </pre>
		
		<p><b>Результат:</b></p>
		<div class="well margin-top">
			<?php

				$a = rand(0, 15);

				switch($a) {
					case 0: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 1: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 2: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 3: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 4: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 5: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 6: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 7: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 8: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 9: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 10: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 11: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 12: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 13: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 14: echo '<p class="margin-left">' . $a . '</p>'; $a++;
					case 15: echo '<p class="margin-left">' . $a . '</p>'; $a++;
				} 
			?>
		</div>
		<div>
	</body>
</html>