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
    </pre>
    
    <p class="margin-left"><b>Результат:</b></p>
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
    </body>
</html>