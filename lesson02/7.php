<!DOCTYPE html>
    <head>
        <meta http-equiv=Content-Type content="text/html;charset=UTF-8">
        <title>Задание 7</title>
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
        *  задание 7 
        *  Написать функцию, которая вычисляет текущее время и возвращает   
        *  его в формате с правильными склонениями, например:
        * 
        *  22 часа 15 минут
        *  21 час 43 минуты
        */

        $hours = 0;
        $minutes = 0;
        
        if(isset($_POST['hours']) && isset($_POST['minutes'])) {
            $hours = $_POST['hours'];
            $minutes = $_POST['minutes'];
        }
        
        function getCurTime($h, $m) {

            $arr1 = [1,21];
            $arr2 = [2,3,4,22,23];

            $str = '';
            if(in_array($h, $arr1)) {
                $str .= $h . ' час ';
            } else if(in_array($h, $arr2)) {
                $str .= $h . ' часа ';
            } else {
                $str .= $h . ' часов ';
            }

            if(in_array($m, $arr1)) {
                $str .= $m . ' минута';
            } else if(in_array($m, $arr2)) {
                $str .= $m . ' минуты';
            } else {
                $str .= $m . ' минут';
            }


            return $str;
        }

        &lt;form class="margin-left" method="post" action="7.php"&gt;
            &lt;label&gt;Часы:&lt;/label&gt;
            &lt;input type="text" value="&lt;?= $hours ?&gt;" name="hours" required&gt;
            &lt;label&gt;Минуты:&lt;/label&gt;
            &lt;input type="text" value="&lt;?= $minutes ?&gt;" name="minutes" required&gt;
            &lt;input type="submit"&gt;
        &lt;/form&gt;
        &lt;p&gt;
        &lt;?= getCurTime($hours, $minutes); ?&gt;
        &lt;/p&gt;
        </pre>
    
        <p class="margin-left"><b>Результат:</b></p>
        <?php
        
		$hours = 0;
		$minutes = 0;
		
        if(isset($_POST['hours']) && isset($_POST['minutes'])) {
            $hours = $_POST['hours'];
			$minutes = $_POST['minutes'];
        }
		
        function getCurTime($h, $m) {

            $arr1 = [1,21];
            $arr2 = [2,3,4,22,23];

            $str = '';
            if(in_array($h, $arr1)) {
                $str .= $h . ' час ';
            } else if(in_array($h, $arr2)) {
                $str .= $h . ' часа ';
            } else {
                $str .= $h . ' часов ';
            }

            if(in_array($m, $arr1)) {
                $str .= $m . ' минута';
            } else if(in_array($m, $arr2)) {
                $str .= $m . ' минуты';
            } else {
                $str .= $m . ' минут';
            }


            return $str;
        }

        ?>
		<form class="margin-left" method="post" action="7.php">
			<label>Часы:</label>
            <input type="text" value="<?= $hours ?>" name="hours" required>
			<label>Минуты:</label>
			<input type="text" value="<?= $minutes ?>" name="minutes" required>
            <input type="submit">
        </form>
		<p class="margin-left">
        <?= getCurTime($hours, $minutes); ?>
        </p>
    </body>
</html>