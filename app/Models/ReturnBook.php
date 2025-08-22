<?php

namespace App\Models;

use App\Enums\ReturnBookStatus;
use Illuminate\Database\Eloquent\Model;

class ReturnBook extends Model
{
    protected $fillable = [
        'return_book_code',
        'loan_id',
        'user_id',
        'book_id',
        'return_date',
        'status'
    ];


    protected function casts(): array
    {
        return [
            'return_date' => 'date',
            'status' => ReturnBookStatus::class,
        ];
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function fine()
    {
        return $this->hasOne(Fine::class);
    }

    public function returnBookCheck()
    {
        return $this->hasOne(ReturnBookCheck::class);
    }
}
