<!DOCTYPE html>
    <head>
        <meta http-equiv=Content-Type content="text/html;charset=UTF-8">
        <title>Задание 4</title>
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
        *  задание 4 
        *  объявить массив, индексами которого
        *  являются буквы русского языка,
        *  а значениями - соответствующие латинские
        *  буквосочетания ('а' => 'a', 'б' => b, 'в' => 'v',
        *  'г' => g, ..., 'э' => 'e', 'ю' => 'yu', 'я' => 'ya').
        *  
        *  Написать функцию транслитерации строк.
        */
        
        function translit($str) {
            $alfabet = [
                'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
                'е' => 'ye', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
                'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
                'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
                'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'c', 'ч' => 'ch',
                'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'i', 'ь' => '',
                'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
            ];
            
            foreach($alfabet as $key => $value) {
                $alfabet[mb_strtoupper($key)] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
            }

            $newstr = '';
            
            for($i=0; $i < mb_strlen($str); $i++) {
                if(isset($alfabet[mb_substr($str, $i, 1)])) {
                    $newstr .= $alfabet[mb_substr($str, $i, 1)];
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
            &lt;p&gt;&lt;?= translit($string) ?&gt&lt;/p&gt; 
        &lt;?php endif ?&gt;
    </pre>
    
    <p class="margin-left"><b>Результат:</b></p>
        <?php
        
        function translit($str) {
            $alfabet = [
                'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
                'е' => 'ye', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
                'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
                'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
                'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'c', 'ч' => 'ch',
                'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'i', 'ь' => '',
                'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
            ];
            
            foreach($alfabet as $key => $value) {
                $alfabet[mb_strtoupper($key)] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
            }

            $newstr = '';
            
            for($i=0; $i < mb_strlen($str); $i++) {
                if(isset($alfabet[mb_substr($str, $i, 1)])) {
                    $newstr .= $alfabet[mb_substr($str, $i, 1)];
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
        
        <form class="margin-left" method="post" action="4.php">
            <input type="text" value="<?= $string ?>" name="string">
            <input type="submit">
        </form>
        <?php
        if($string): ?>        
            <p class="margin-left"><?= translit($string) ?></p> 
        <?php endif ?>
    </body>
</html>