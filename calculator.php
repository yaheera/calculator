<?php
// Обработка данных формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $operator = $_POST['operator'];

  // Проверка числовых значений
  if (!is_numeric($num1) || !is_numeric($num2)) {
    $result = 'Введите числа';
  } else {  
    // Вычисление результата
      //... (скопируйте сюда код из вашего шага 2)
switch ($operator) {
  case '+':
    $result = $num1 + $num2;
    break;
  case '-':
    $result = $num1 - $num2;
    break;
  case '*':
    $result = $num1 * $num2;
    break;
  case '/':
    if ($num2 == 0) {
      $result = 'На ноль делить нельзя';
      break;
    }
    $result = $num1 / $num2;
    break;
  case '%':
    $result = $num1 * $num2 / 100;
    break;
  default:
    $result = 'Выберите операцию';
    break;
}
    // Округление чисел до двух знаков после запятой
    $result = round($result, 2);
  }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Калькулятор</title>
  <style>
    /* Вставьте CSS стили из вашего шага 4 */
    .percent {
        display: inline-block;
    }
    .percent:before {
        content: '%';
        vertical-align: baseline;
    }

  </style>
</head>
<body>
  <form method="post" action="calculator.php">
    <!-- Вставьте HTML формы из вашего шага 1 -->
    <label for="num1">Число 1:</label>
    <input type="number" id="num1" name="num1" required>
  
    <label for="num2">Число 2:</label>
    <input type="number" id="num2" name="num2" required>

    <label for="operator">Операция:</label>
    <select id="operator" name="operator" required>
    <option value="+">+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
    <option value="%">%</option>
    </select>

    <button type="submit">Вычислить</button>
   </form>

  <?php
  if (isset($result)) {
    if ($operator == '%') {
      echo "<p>$num1 умножить на $num2 <span class=\"percent\"></span> равно $result</p>";
    } else {
      echo "<p>$num1 $operator $num2 равно $result</p>";
    }
  }
  ?>

  <?php // Вставьте PHP код для сохранения истории операций в cookie из шага Дополнительные задания ?>

  <?php // Вставьте PHP код для отображения истории операций из cookie здесь ?>

  <?php // Вставьте PHP код для сохранения результатов в файл здесь ?>

</body>
</html>