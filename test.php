<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>
</head>

<body>
<?php
function number_to_words($number) {
  // Массивы с названиями чисел
  $units = array("", "один", "два", "три", "четыре", "пять", "шесть", "семь", "восемь", "девять");
  $teens = array("", "одиннадцать", "двенадцать", "тринадцать", "четырнадцать", "пятнадцать", "шестнадцать", "семнадцать", "восемнадцать", "девятнадцать");
  $tens = array("", "", "двадцать", "тридцать", "сорок", "пятьдесят", "шестьдесят", "семьдесят", "восемьдесят", "девяносто");
  $hundreds = array("", "сто", "двести", "триста", "четыреста", "пятьсот", "шестьсот", "семьсот", "восемьсот", "девятьсот");
  $thousands = array("", "тысяча", "тысячи", "тысяч");

  // Проверка на корректность входных данных
  if (!is_numeric($number)) {
    return "Некорректный ввод";
  }

  // Обработка нуля
  if ($number == 0) {
    return "ноль";
  }

  // Обработка отрицательных чисел
  if ($number < 0) {
    return "минус ".number_to_words(-$number);
  }

  // Преобразование числа в строку
  $number = strval($number);

  // Добавление нулей в начало строки, чтобы длина была кратна трем
  while (strlen($number) % 3 != 0) {
    $number = '0'.$number;
  }

  // Разбиение строки на группы по три цифры
  $groups = str_split($number, 3);

  // Массив для хранения текстового представления каждой группы
  $words = array();

  // Цикл по группам, начиная с самой левой
  for ($i = 0; $i < count($groups); $i++) {
    // Получение текущей группы
    $group = $groups[$i];

    // Пропуск группы, если она равна нулю
    if ($group == '000') {
      continue;
    }

    // Получение цифр из группы
    $a = intval($group[0]); // сотни
    $b = intval($group[1]); // десятки
    $c = intval($group[2]); // единицы

    // Массив для хранения текстового представления текущей группы
    $group_words = array();

    // Добавление сотен, если они есть
    if ($a > 0) {
      $group_words[] = $hundreds[$a];
    }

    // Добавление десятков и единиц, если они есть
    if ($b > 0) {
      if ($b == 1 && $c > 0) {
        // Особый случай для чисел от 11 до 19
        $group_words[] = $teens[$c];
      } else {
        // Обычный случай для остальных чисел
        $group_words[] = $tens[$b];
        if ($c > 0) {
          $group_words[] = $units[$c];
        }
      }
    } else {
      // Добавление единиц, если они есть и нет десятков
      if ($c > 0) {
        $group_words[] = $units[$c];
      }
    }

    // Добавление названия разряда, если он есть
    if ($i < count($groups) - 1) {
      // Получение индекса для названия разряда
      $index = count($groups) - $i - 2;

      // Особый случай для тысяч
      if ($index == 0) {
        // Склонение слова "тысяча" в зависимости от последней цифры
        if ($c == 1 && $b != 1) {
          $group_words[] = $thousands[1];
        } elseif ($c > 1 && $c < 5 && $b != 1) {
          $group_words[] = $thousands[2];
        } else {
          $group_words[] = $thousands[3];
        }
      } else {
        // Обычный случай для остальных разрядов
        $group_words[] = pow(10, $index * 3);
      }
    }

    // Соединение слов в группе с пробелами
    $group_text = implode(" ", $group_words);

    // Добавление группы в общий массив
    $words[] = $group_text;
  }

  // Соединение групп с пробелами
  $text = implode(" ", $words);

  // Возвращение текстового представления числа
  return $text;
} 
ini_set('display_errors',0);
echo number_to_words(1134567890 );
 
?>
</body>
</html>