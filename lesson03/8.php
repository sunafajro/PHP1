<!DOCTYPE html>
    <head>
        <meta http-equiv=Content-Type content="text/html;charset=UTF-8">
        <title>Задание 8</title>
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
        *  задание 8 
        *  повторить третье задание,
        *  но вывести на экран только
        *  города, начинающиеся с буквы "К".
        */
        
        $arr = [
            'Московская область' => [
                'Москва',
                'Зеленоград',
                'Клин'
            ],
            'Ленинградсая область' => [
                'Санкт-Петербург',
                'Всеволжск',
                'Павловск',
                'Кронштадт'
            ],
            'Рязанская область' => [
                'Рязань',
                'Касимов',
                'Сасово',
                'Скопин'
            ]
        ];
        
        foreach($arr as $region =&gt; $cities) {
            echo '&lt;p&gt;' . $region . ':&lt;/br&gt;';
            $str = '';
            foreach($cities as $value) {
                if(mb_substr($value, 0, 1) == 'К') {
                    $str .= $value . ',';
                }
            }
            echo rtrim($str, ',');
            echo '&lt;/p&gt;';
        }
    </pre>
    
    <p class="margin-left"><b>Результат:</b></p>
        <?php
        
        $arr = [
            'Московская область' => [
                'Москва',
                'Зеленоград',
                'Клин'
            ],
            'Ленинградсая область' => [
                'Санкт-Петербург',
                'Всеволжск',
                'Павловск',
                'Кронштадт'
            ],
            'Рязанская область' => [
                'Рязань',
                'Касимов',
                'Сасово',
                'Скопин'
            ]
        ];

        foreach($arr as $region => $cities) {
            echo '<p class="margin-left">' . $region . ':</br>';
            $str = '';
            foreach($cities as $value) {
                if(mb_substr($value, 0, 1) == 'К') {
                    $str .= $value . ',';
                }
            }
            echo rtrim($str, ',');
            echo '</p>';
        }

        ?>
        
    </body>
</html>