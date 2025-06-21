<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';
    protected $primaryKey = 'id_unit';

    protected $fillable = [
        'name_unit'
        ];

    //relasi ke tabel bhps
    public function bhps()
    {
        return $this->hasMany(Bhp::class, 'id_unit', 'id_unit');
    }
}
