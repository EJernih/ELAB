<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailRequest extends Model
{
    use HasFactory;

    protected $table = 'detail_requests';
    protected $primaryKey = 'id_detail_request';
    public $incrementing = true;
    protected $keyType = 'int';

    public function getRouteKeyName()
    {
        return 'id_detail_request';
    }

    protected $fillable = [
        'id_request', 
        'id_bhp', 
        'quantity_requested', 
        'referensi'
    ];

    //relasi ke tabel bhp
    public function bhp()
    {
        return $this->belongsTo(Bhp::class, 'id_bhp');
    }
    //relasi ke tabel bhp_requests
    public function bhpRequest()
    {
        return $this->belongsTo(BhpRequest::class, 'id_request');
    }

}
