
<?php

echo "Введите первое число: ";
$first = trim(fgets(STDIN));

echo "Введите второе число: ";
$second = trim(fgets(STDIN));

if (
    filter_var($first, FILTER_VALIDATE_INT) === false ||
    filter_var($second, FILTER_VALIDATE_INT) === false
) {
    fwrite(STDERR, "Введите, пожалуйста, число" . PHP_EOL);
    exit(1);
}

$first = (int) $first;
$second = (int) $second;


if ($second === 0) {
    fwrite(STDERR, "Делить на 0 нельзя" . PHP_EOL);
    exit(1);
}

$result = $first / $second;

echo "Результат: " . $result . PHP_EOL;
