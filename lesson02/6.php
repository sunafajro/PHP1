<!DOCTYPE html>
    <head>
        <meta http-equiv=Content-Type content="text/html;charset=UTF-8">
        <title>Задание 6</title>
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
        *  задание 6 
        *  С помощью рекурсии организовать функцию возведения числа в степень.  
        *  Формат: function getPower($val, $pow), где $val – заданное число, $pow – степень.
        */
        
        $value = NULL;
        $power = NULL;
        
        if(isset($_POST['value']) && isset($_POST['power'])) {
            $value = $_POST['value'];
            $power = $_POST['power'];
        }
        
        function getPower($val, $pow) {
          if ($pow > 1) {
            return $val * pow($val, $pow - 1);
          } else if ($pow == 0) {
            return 1;
          } else {
            return $val;
          }
        }

        &lt;form method="post" action="6.php"&gt;
            &lt;label&gt;Число:&lt;/label&gt;
            &lt;input type="text" value="&lt;?= $value ?&gt;" name="value" required&gt;
            &lt;label&gt;Степень:&lt;/label&gt;
            &lt;input type="text" value="&lt;?= $power ?&gt;" name="power" required&gt;
            &lt;input type="submit"&gt;
        &lt;/form&gt;
        &lt;p&gt;
        &lt;?= getPower($value, $power); ?&gt;
        &lt;/p&gt;
        </pre>
    
        <p class="margin-left"><b>Результат:</b></p>        
        <?php

		$value = 0;
		$power = 0;
        
        if(isset($_POST['value']) && isset($_POST['power'])) {
            $value = $_POST['value'];
			$power = $_POST['power'];
        }
		
        function getPower($val, $pow) {
          if ($pow > 1) {
            return $val * pow($val, $pow - 1);
          } else if ($pow == 0) {
            return 1;
          } else {
            return $val;
          }
        }
        ?>
		
		<form class="margin-left" method="post" action="6.php">
			<label>Число:</label>
            <input type="text" value="<?= $value ?>" name="value" required>
			<label>Степень:</label>
			<input type="text" value="<?= $power ?>" name="power" required>
            <input type="submit">
        </form>
		<p class="margin-left">
        <?= getPower($value, $power); ?>
        </p>
    </body>
</html>