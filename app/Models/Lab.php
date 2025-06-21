<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lab extends Model
{
    use HasFactory;
    protected $table = 'labs';
    protected $primaryKey = 'id_lab';

    protected $fillable = [
        'name_lab',
        'id_prodi'
    ];

    //relasi ke tabel prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
    }

    //relasi ke bhp_lab
    public function bhps()
    {
        return $this->belongsToMany(Bhp::class, 'bhp_lab', 'id_lab', 'id_bhp')->withPivot('qty');
    }
}
