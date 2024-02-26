<?php

namespace App\Enums;

enum StatusEnum: string
{
    case NEW = 'Новый';
    case TRUE = 'Подтвержденный';
    case FALSE = 'Отмененный';
}
