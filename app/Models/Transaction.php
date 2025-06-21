<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey  = 'id_transaction';

    protected $fillable = [
        'date_transaction',
        'type_transaction',
        'matakuliah',
        'id_lab',
        'id_bhp',
        'quantity',
        'description'
    ];
}
