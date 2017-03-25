<!DOCTYPE html>
    <head>
        <meta http-equiv=Content-Type content="text/html;charset=UTF-8">
        <title>Задание 6</title>
        <style>
        .margin-left {
            margin-left: 55px;
        }
        .menu {
            border: 1px solid #ccc;
        }
        .menu > li{
            display: inline-block;
            padding: 10px;
            width: 100px;
            text-align: center;
            position: relative;
        }
        .menu li:hover {
            background-color: #ccc;
        }
        .menu > li:first-Child {
            margin-left: -40px;
        }
        .submenu {
            display: none;
            position: absolute;
            top: 38px;
            border-left: 1px solid #ccc;
            border-right: 1px solid #ccc;
            padding: 0px;
            margin-left: -10px;
        }
        .submenu > li{
            list-style-type: none;
            padding: 10px;
            width: 100px;
            border-bottom: 1px solid #ccc;
            
        }
        .menu li:hover .submenu {
            display: block;
        }
        </style>
    </head>
    <body>
    <p class="margin-left"><a href="index.php">Назад</a></p>
    <p class="margin-left"><b>Описание и код задания:</b></p>
    <pre>
        /* 
        *  задание 6 
        *  в имеющемся шаблоне сайта заменить
        *  статичное меню (ul - li) на генерируемое 
        *  через PHP. Необходимо представить пункты
        *  меню как элементы массива и вывести их циклом.
        *  Подумать, как можно реализовать меню с вложенным 
        *  подменю? Попробовать его реализовать. 
        */
        
        &lt;?php 
            $menu = [
                'Главная',
                'Загрузки' => [
                    'Windows',
                    'Linux',
                    'Mac'
                ],
                'Документация',
                'О нас',
                'Помощь',
            ];
        ?>
        &lt;ul class="margin-left menu"&gt;
            &lt;?php foreach($menu as $key => $value) {
                echo '&lt;li&gt;';
                if(is_array($value)) {
                    echo $key;
                    echo '&lt;ul class="submenu"&gt;';
                    foreach($value as $subvalue) {
                        echo '&lt;li&gt;' . $subvalue . '&lt;/li&gt;';
                    }
                    echo '&lt;/ul&gt;';
                } else {
                    echo $value;
                }
                echo '&lt;/li&gt;';
            } ?>
        &lt;/ul&gt;
    </pre>
    
    <p class="margin-left"><b>Результат:</b></p>
    <?php 
        $menu = [
            'Главная',
            'Загрузки' => [
                'Windows',
                'Linux',
                'Mac'
            ],
            'Документация',
            'О нас',
            'Помощь',
        ];
    ?>
    <ul class="margin-left menu">
        <?php foreach($menu as $key => $value) {
            echo '<li>';
            if(is_array($value)) {
                echo $key;
                echo '<ul class="submenu">';
                foreach($value as $subvalue) {
                    echo '<li>' . $subvalue . '</li>';
                }
                echo '</ul>';
            } else {
                echo $value;
            }
            echo '</li>';
        } ?>
    </ul>
        
    </body>
</html>