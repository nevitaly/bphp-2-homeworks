<?php

declare(strict_types=1);

function generateSchedule(int $year, int $month): void
{
    $months = [
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март',
        4 => 'Апрель',
        5 => 'Май',
        6 => 'Июнь',
        7 => 'Июль',
        8 => 'Август',
        9 => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь'
    ];

    $startDate = new DateTimeImmutable(
        sprintf('%04d-%02d-01', $year, $month)
    );

    $daysInMonth = (int) $startDate->format('t');

    $workDate = $startDate;

    echo $months[$month] . ' ' . $year . PHP_EOL;
    echo 'Рабочие дни отмечены знаком +' . PHP_EOL;

    for ($day = 1; $day <= $daysInMonth; $day++) {
        $currentDate = $startDate->modify(
            '+' . ($day - 1) . ' days'
        );

        while ((int) $workDate->format('N') >= 6) {
            $workDate = $workDate->modify('+1 day');
        }

        if ($currentDate == $workDate) {
            echo $currentDate->format('d.m.Y') . ' + Работа' . PHP_EOL;

            $workDate = $workDate->modify('+3 days');
        } else {
            echo $currentDate->format('d.m.Y') . ' - Выходной' . PHP_EOL;
        }
    }
}

$year = (int) date('Y');
$month = (int) date('n');

generateSchedule($year, $month);
