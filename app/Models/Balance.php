<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUser',
        'balance',
        'atm_balance',
        'physical_money',
        'total_balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
