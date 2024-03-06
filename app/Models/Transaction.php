<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUser',
        'idCategory',
        'date',
        'total',
        'desc',
        'isATM',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'idCategory');
    }
}
