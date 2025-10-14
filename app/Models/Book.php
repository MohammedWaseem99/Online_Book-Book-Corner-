<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'author_id',
        'publication_id',
        'price',
        'picture',
        'discount'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }

    public function getDiscountedPriceAttribute()
    {
        if ($this->discount) {
            return $this->price - ($this->price * $this->discount / 100);
        }
        return $this->price;
    }
}
