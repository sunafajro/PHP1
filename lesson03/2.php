<!DOCTYPE html>
	<head>
	    <meta http-equiv=Content-Type content="text/html;charset=UTF-8">
	    <title>Задание 2</title>
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
        *  задание 2 
        *  с помощью цикла do... while
        *  написать функцию для вывода чисел
        *  от 0 до 10, чтобы результат выглядел так:
        *
        *  0 - это ноль.
        *  1 - нечетное число.
        *  2 - четное число.
        *  3 - нечетное число.
        *  ...
        *  10 - четное число
        */
        
        $var = 0;
        
        do {
            if($var == 0) {
                echo '&lt;p&gt;0 - это ноль&lt;/p&gt;';
            } else {
                echo '&lt;p&gt;' . $var . ' - ' . (($var % 2) ? 'нечетное' : 'четное') . ' число&lt;/p&gt;';
            }
            $var++;
        }
        while($var &lt;= 10);
	</pre>
	
	<p class="margin-left"><b>Результат:</b></p>
		<?php
		
		$var = 0;

		do {
			if($var == 0) {
				echo '<p class="margin-left">0 - это ноль</p>';
			} else {
				echo '<p class="margin-left">' . $var . ' - ' . (($var % 2) ? 'нечетное' : 'четное') . ' число</p>';
			}
			$var++;
		}
		while($var <= 10);

		?>
		
	</body>
</html>