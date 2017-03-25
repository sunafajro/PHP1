<!DOCTYPE html>
    <head>
        <meta http-equiv=Content-Type content="text/html;charset=UTF-8">
        <title>Задание 5</title>
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
        *  задание 5 
        *  Написать функцию, которая
        *  заменяет в строке пробелы на подчеркивания
        *  и возвращает видоизмененную строчку.
        */
        
        function removeBackspaces($str) {
            $newstr = '';
            
            for($i=0; $i < mb_strlen($str); $i++) {
                if(mb_substr($str, $i, 1) == ' ') {
                    $newstr .= '_';
                } else {
                    $newstr .= mb_substr($str, $i, 1);
                }
            }
            return $newstr;
        }
        
        $string = NULL;
        
        if(isset($_POST['string'])) {
            $string = $_POST['string'];
        }
        
        ?>
        
        &lt;form class="margin-left" method="post" action="4.php"&gt;
            &lt;input type="text" value="&lt;?= $string ?&gt" name="string"&gt;
            &lt;input type="submit"&gt;
        &lt;/form&gt;
		
        &lt;?php
        if($string): ?&gt;        
            &lt;p&gt;&lt;?= removeBackspaces($string) ?&gt&lt;/p&gt; 
        &lt;?php endif ?&gt;
    </pre>
    
    <p class="margin-left"><b>Результат:</b></p>
        <?php
        
        function removeBackspaces($str) {
            $newstr = '';
            
            for($i=0; $i < mb_strlen($str); $i++) {
                if(mb_substr($str, $i, 1) == ' ') {
                    $newstr .= '_';
                } else {
                    $newstr .= mb_substr($str, $i, 1);
                }
            }
            return $newstr;
        }
        
        $string = NULL;
        
        if(isset($_POST['string'])) {
            $string = $_POST['string'];
        }
        ?>
        
        <form class="margin-left" method="post" action="5.php">
            <input type="text" value="<?= $string ?>" name="string">
            <input type="submit">
        </form>
        <?php
        if($string): ?>        
            <p class="margin-left"><?= removeBackspaces($string) ?></p> 
        <?php endif ?>
    </body>
</html>