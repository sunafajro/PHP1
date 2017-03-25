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
        *  Вывести с помощью цикла for
        *  числа от 0 до 9, НЕ используя
        *  тело цикла.
        *  То есть выглядеть должно так:
        *  
        *  for(...) { // здесь пусто }
        */
        
        function printNum($i) {
            echo '&lt;p&gt;' . $i . '&lt;/p&gt;';
        }
		
        for($i=0; $i < 10; printNum($i++)) {}
    </pre>
    
    <p class="margin-left"><b>Результат:</b></p>
        <?php
        function printNum($i) {
            echo '<p class="margin-left">' . $i . '</p>';
        }
		
        for($i=0; $i < 10; printNum($i++)) {}
        ?>
        
    </body>
</html>