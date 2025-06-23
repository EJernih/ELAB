<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BhpRequest extends Model
{
    use HasFactory;

    protected $table = 'bhp_requests';
    protected $primaryKey = 'id_request';

    protected $fillable = [
        'semester',
        'academic_year',
        'request_date',
        'id_user',
        'id_lab',
        'status'
    ];

    //relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    //relasi ke tabel lab
    public function lab()
    {
        return $this->belongsTo(Lab::class, 'id_lab');
    }

    //relasi te tabel detail_requests
    public function detail_requests()
    {
        return $this->hasMany(DetailRequest::class, 'id_request');
    }
}
