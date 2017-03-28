<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Урок 2</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="../style.css" rel="stylesheet">
		<style>
			.container {
				width:900px;
				margin: 0 auto;
			}

			.margin-left {
				margin-left: 55px;
			}
		</style>
	</head>
	<body>
	    <div class="container">
			<h1 class="margin-left">Домашнее задание урока №2</h1>
			<p class="margin-left"><a href="../index.php">Назад</a></p>
			<h3 class="margin-left">Описание задач:</h3>
			<ol class="margin-left description">
			<li>Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
				<ul>
					<li>если $a и $b положительные, вывести их разность;</li>
					<li>если $а и $b отрицательные, вывести их произведение;</li>
					<li>если $а и $b разных знаков, вывести их сумму;</li>
					<li>ноль можно считать положительным числом.</li>
				</ul>
			</li>
			<li>Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.</li>

			<li>Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.</li>

			<li>Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.<br/> В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).</li>

			<li>Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.</li>

			<li>*С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.</li>

			<li>*Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
				<ul>
					<li>22 часа 15 минут</li>
					<li>21 час 43 минуты</li>
				</ul>
			</li>
			</ol>
			<h3 class="margin-left">Решения:</h3>
			<ul class="margin-left">
				<?php for($i=1;$i<8;$i++) :	?>
					<?php if($i != 5) : ?>
						<li><a href="<?= $i ?>.php">Задание <?= $i ?></a></li>
					<?php endif; ?>
				<?php endfor; ?>
			</ul>
		</div>
	</body>
</html>