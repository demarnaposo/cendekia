<?php


namespace App\Enums;


enum ReturnBookStatus: string
{
    case CHECKED = 'Pengecekan';
    case RETURNED = 'Dikembalikan';
    case FINE = 'Denda';

    public static function options(): array
    {
        return collect(self::cases())->map(fn($item) => [
            'value' => $item->value,
            'label' => $item->name
        ])->values()->toArray();
    }
}
