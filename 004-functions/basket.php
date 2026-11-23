<?php

declare(strict_types=1);

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;

$operations = [
    OPERATION_EXIT => '0. Завершить программу.',
    OPERATION_ADD => '1. Добавить товар в список покупок.',
    OPERATION_DELETE => '2. Удалить товар из списка покупок.',
    OPERATION_PRINT => '3. Отобразить список покупок.',
];

$items = [];

// Вывод списка покупок
function printItems(array $items): void
{
    if (count($items) === 0) {
        echo 'Ваш список покупок пуст.' . PHP_EOL;
    } else {
        echo 'Ваш список покупок:' . PHP_EOL;
        echo implode(PHP_EOL, $items) . PHP_EOL;
    }
}

// Выбор операции
function selectOperation(array $items, array $operations): int
{
    do {
        printItems($items);

        echo 'Выберите операцию:' . PHP_EOL;
        echo implode(PHP_EOL, $operations) . PHP_EOL;
        echo '> ';

        $operation = (int) trim(fgets(STDIN));

        if (!array_key_exists($operation, $operations)) {
            echo 'Неизвестная операция. Повторите попытку.' . PHP_EOL;
        }

    } while (!array_key_exists($operation, $operations));

    return $operation;
}

// Добавление товара
function addItem(array &$items): void
{
    echo 'Введите название товара: ';
    $item = trim(fgets(STDIN));

    if ($item !== '') {
        $items[] = $item;
        echo 'Товар добавлен.' . PHP_EOL;
    }
}

// Удаление товара
function deleteItem(array &$items): void
{
    if (count($items) === 0) {
        echo 'Список покупок пуст.' . PHP_EOL;
        return;
    }

    printItems($items);

    echo 'Введите название товара для удаления: ';
    $item = trim(fgets(STDIN));

    while (($key = array_search($item, $items, true)) !== false) {
        unset($items[$key]);
    }

    $items = array_values($items);
}

// Отображение списка
function showItems(array $items): void
{
    printItems($items);

    echo 'Всего ' . count($items) . ' позиций.' . PHP_EOL;
    echo 'Нажмите Enter для продолжения';
    fgets(STDIN);
}

// Основной цикл программы
do {
    $operationNumber = selectOperation($items, $operations);

    echo 'Выбрана операция: ' .
        $operations[$operationNumber] . PHP_EOL;

    switch ($operationNumber) {
        case OPERATION_ADD:
            addItem($items);
            break;

        case OPERATION_DELETE:
            deleteItem($items);
            break;

        case OPERATION_PRINT:
            showItems($items);
            break;
    }

    echo "\n ----- \n";

} while ($operationNumber > OPERATION_EXIT);

echo 'Программа завершена' . PHP_EOL;
