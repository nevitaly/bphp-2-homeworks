<?php

$name = readline("Введите имя: ");
$surname = readline("Введите фамилию: ");
$patronymic = readline("Введите отчество: ");

$name = mb_convert_case(trim($name), MB_CASE_TITLE, 'UTF-8');
$surname = mb_convert_case(trim($surname), MB_CASE_TITLE, 'UTF-8');
$patronymic = mb_convert_case(trim($patronymic), MB_CASE_TITLE, 'UTF-8');

$nameInitial = mb_substr($name, 0, 1, 'UTF-8');
$surnameInitial = mb_substr($surname, 0, 1, 'UTF-8');
$patronymicInitial = mb_substr($patronymic, 0, 1, 'UTF-8');

$fullName = $surname . ' ' . $name . ' ' . $patronymic;

$surnameAndInitials = $surname . ' ' . $nameInitial . '.' . $patronymicInitial . '.';

$fio = $surnameInitial . $nameInitial . $patronymicInitial;

echo "Полное имя: '$fullName'" . PHP_EOL;
echo "Фамилия и инициалы: '$surnameAndInitials'" . PHP_EOL;
echo "Аббревиатура: '$fio'" . PHP_EOL;
