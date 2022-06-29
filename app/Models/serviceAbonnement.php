<?php

namespace App\Models;

use App\Models\service;
use App\Models\abonnement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class serviceAbonnement extends Pivot
{
    use HasFactory;
    protected $table = 'service_abonnements';
    protected $guarded=[];
    protected $dates=['created_at','updated_at'];

    public function abonnement(){
        return $this->belongsTo(abonnement::class,'service_abonnnements');
    }
    public function service(){
        return $this->belongsTo(service::class,'service_abonnnements');
    }
}
