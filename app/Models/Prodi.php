<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodis';
    protected $primaryKey = 'id_prodi';

    protected $fillable = [
        'name_prodi'
        ];

    //relasi ke tabel lab
    public function labs()
    {
        return $this->hasMany(Lab::class, 'id_prodi', 'id_prodi');
    }
}
