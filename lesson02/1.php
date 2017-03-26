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
        *  Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. 
        *  Затем написать скрипт, который работает по следующему принципу:
        *    если $a и $b положительные, вывести их разность;</li>
        *    если $а и $b отрицательные, вывести их произведение;</li>
        *    если $а и $b разных знаков, вывести их сумму;</li>
        *    ноль можно считать положительным числом.</li>
        */
        
        $a = NULL;
        $b = NULL;
        $result = NULL;
        
        if(isset($_POST['a']) && isset($_POST['b'])) {
            $a = (int)$_POST['a'];
            $b = (int)$_POST['b'];
            
            if($a >= 0 && $b >= 0) {
                $result = $a - $b;
            } else if($a < 0 && $b < 0) {
                $result = $a * $b;
            } else {
                $result = $a + $b;
            }
        }
        ?>
        
        &lt;form class="margin-left" method="post" action="1.php"&gt;
            &lt;input type="text" value="&lt;?= $a ?&gt;" name="a" required&gt;
            &lt;input type="text" value="&lt;?= $b ?&gt;" name="b" required&gt;
            &lt;input type="submit"&gt;
        &lt;/form&gt;
        &lt;?php
        if($result): ?&gt;        
            &lt;p class="margin-left"&gt;&lt;?= $result ?&gt;&lt;/p&gt; 
        &lt;?php endif ?&gt;
    </pre>
    
    <p class="margin-left"><b>Результат:</b></p>
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
        
        <form class="margin-left" method="post" action="1.php">
            <input type="text" value="<?= $a ?>" name="a" required>
            <input type="text" value="<?= $b ?>" name="b" required>
            <input type="submit">
        </form>
        <?php
        if($result): ?>        
            <p class="margin-left"><?= $result ?></p> 
        <?php endif ?>
    </body>
</html>