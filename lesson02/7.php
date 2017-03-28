<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Задание 7</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="../style.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p><a href="index.php">Назад</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
            <p><b>Описание и код задания:</b></p>
    <pre>
    <code>
        /* 
        *  задание 7 
        *  Написать функцию, которая вычисляет текущее время и возвращает   
        *  его в формате с правильными склонениями, например:
        * 
        *  22 часа 15 минут
        *  21 час 43 минуты
        */
        
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
        </code>
        </pre>
            </div>
            <div class="col-sm-4">	
                <p><b>Результат:</b></p>
                
                <?php
                
                $hours = 0;
                $minutes = 0;
                $result = 0;
                
                if(isset($_POST['hours']) && isset($_POST['minutes'])) {
                    $hours = $_POST['hours'];
                    $minutes = $_POST['minutes'];
                    $result = getCurTime($hours, $minutes);
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
                <form method="post" action="./7.php">
                    <div class="form-group">
                        <input type="text" value="<?= $hours ?>" name="hours" class="form-control" placeholder="Введите часы" required>
                    </div>
                    <div class="form-group">
                        <input type="text" value="<?= $minutes ?>" name="minutes" class="form-control" placeholder="Введите минуты" required>
                    </div>
                    <input type="submit" class="btn btn-default">
                </form>
                <?php if($result !== NULL): ?>
                <div class="well margin-top">                
                    <samp><?= $result ?></samp>         
                </div>
                <?php endif ?>
                </div>
            </div>
        </div>
    </body>
</html>