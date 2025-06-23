<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bhp extends Model
{
    use HasFactory;

    protected $table = 'bhps';
    protected $primaryKey = 'id_bhp';

    protected $fillable = [
        'name_bhp',
        'description',
        'minimum_stock',
        'id_unit'
        ];

    //relasi ke unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit');
    }

    //relasi ke transaction
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_bhp');
    }

    //relasi ke bhp_lab
    public function labs()
    {
        return $this->belongsToMany(Lab::class, 'bhp_lab', 'id_bhp', 'id_lab')->withPivot('qty');
    }

    //relasi ke tabel detail_requests
    public function detailRequests()
    {
        return $this->hasMany(DetailRequest::class, 'id_detail_request');
    }
}
