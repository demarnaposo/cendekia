<?php

namespace App\Models;

use App\Enums\BookStatus;
use App\Enums\BookLanguage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    protected $fillable = [
        'book_code',
        'title',
        'slug',
        'author',
        'publication_year',
        'isbn',
        'language',
        'synopsis',
        'number_of_pages',
        'status',
        'cover',
        'price',
        'category_id',
        'publisher_id'
    ];


    protected function casts(): array
    {

        return [
            'language' => BookLanguage::class,
            'status' => BookStatus::class,
        ];
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
