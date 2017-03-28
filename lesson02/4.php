<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Задание 3</title>
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
        *  задание 3 
        *  Реализовать основные 4 арифметические операции в  
        *  виде функций с двумя параметрами. Обязательно использовать оператор return.
        */
        
        function actSum($x,$y) {
            return $x + $y;
        }

        function actSub($x,$y) {
            return $x - $y;
        }

        function actMul($x,$y) {
            return $x * $y;
        }

        function actDiv($x,$y) {
            if($y == 0) {
                return 'деление на ноль!';
            }
            return $x / $y;
        }
        
        function mathOperation($arg1, $arg2, $operation) {
            switch($operation) {
                case 'sum': return actSum($arg1, $arg2);
                case 'sub': return actSub($arg1, $arg2);
                case 'mul': return actMul($arg1, $arg2);
                case 'div': return actDiv($arg1, $arg2);
            }
        }
    </code>
    </pre>
            </div>
            <div class="col-sm-4">	
                <p><b>Результат:</b></p>

                <?php 
                
                $a = NULL;
                $b = NULL;
                $operation = NULL;
                $result = NULL;
                
                if(isset($_POST['a']) && isset($_POST['b']) && isset($_POST['operation'])) {
                    $a = (int)$_POST['a'];
                    $b = (int)$_POST['b'];
                    $operation = (string)$_POST['operation'];
                    
                    $result = mathOperation((int)$_POST['a'], (int)$_POST['b'], (string)$_POST['operation']);
                }
                function actSum($x,$y) {
                    return $x + $y;
                }

                function actSub($x,$y) {
                    return $x - $y;
                }

                function actMul($x,$y) {
                    return $x * $y;
                }

                function actDiv($x,$y) {
                    if($y == 0) {
                        return 'деление на ноль!';
                    }
                    return $x / $y;
                }

                function mathOperation($arg1, $arg2, $operation) {
                    switch($operation) {
                        case 'sum': return actSum($arg1, $arg2);
                        case 'sub': return actSub($arg1, $arg2);
                        case 'mul': return actMul($arg1, $arg2);
                        case 'div': return actDiv($arg1, $arg2);
                    }
                }
                ?>

                <form method="post" action="./4.php">
                    <div class="form-group">
                        <input type="text" value="<?= $a ?>" name="a" class="form-control" placeholder="Введите первое число" required>
                    </div>
                    <div class="form-group">
                        <input type="text" value="<?= $b ?>" name="b" class="form-control" placeholder="Введите второе число" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="operation">
                            <option value="sum"<?= ($operation == 'sum') ? ' selected' : '' ?>>Сложить</option>
                            <option value="sub"<?= ($operation == 'sub') ? ' selected' : '' ?>>Вычесть</option>
                            <option value="mul"<?= ($operation == 'mul') ? ' selected' : '' ?>>Умножить</option>
                            <option value="div"<?= ($operation == 'div') ? ' selected' : '' ?>>Разделить</option>
                        </select>
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