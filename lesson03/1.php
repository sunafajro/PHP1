<!DOCTYPE html>
	<head>
	    <meta http-equiv=Content-Type content="text/html;charset=UTF-8">
	    <title>Задание 1</title>
		<style>
		.margin-left {
			margin-left: 55px;
		}
		</style>
	</head>
	<body>
	<p class="margin-left"><a href="index.php">Назад</a></p>
	<p class="margin-left"><b>Описание и код задания:</b></p>
	<pre>
        /* 
        *  задание 1 
        *  с помощью цикла while вывести все числа
        *  в промежутке от 0 до 100, которые 
        *  делятся на 3 без остатка
        */
        
        $var = 0;
        
        while($var <= 100) {
            if($var % 3 == 0) {
                echo '&lt;p&gt;' . $var . '&lt;/p&gt;';
            }
            $var++; 
        }
	</pre>
	
	<p class="margin-left"><b>Результат:</b></p>
		<?php

		$var = 0;

		while($var <= 100) {
			if($var % 3 == 0) {
				echo '<p class="margin-left">' . $var . '</p>';
			}
			$var++; 
		}

		?>
		
	</body>
</html>