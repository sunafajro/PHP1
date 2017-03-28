<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Задание 6</title>
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
        *  задание 6 
        *  С помощью рекурсии организовать функцию возведения числа в степень.  
        *  Формат: function getPower($val, $pow), где $val – заданное число, $pow – степень.
        */
        
        function getPower($val, $pow) {
          if ($pow > 1) {
            return $val * pow($val, $pow - 1);
          } else if ($pow == 0) {
            return 1;
          } else {
            return $val;
          }
        }
    </code>
    </pre>
            </div>
            <div class="col-sm-4">	
                <p><b>Результат:</b></p>        
                <?php

                $value = 0;
                $power = 0;
                $result = 0;
                
                if(isset($_POST['value']) && isset($_POST['power'])) {
                    $value = $_POST['value'];
                    $power = $_POST['power'];
                    $result = getPower($value, $power);
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
                
                <form method="post" action="./6.php">
                    <div class="form-group">
                        <input type="text" value="<?= $value ?>" name="value" class="form-control" placeholder="Введите число" required>
                    </div>
                    <div class="form-group">
                        <input type="text" value="<?= $power ?>" name="power" class="form-control" placeholder="Введите степень" required>
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