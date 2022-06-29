<?php

namespace App\Models;

use App\Models\service;
use App\Models\abonnement;
use Illuminate\Foundation\Auth\User;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class service extends Model
{
    use PowerJoins;
    use HasFactory;
    protected $guarded=[];
    
    public function acte(){
        return $this->belongsToMany(acte::class,'acte_services');
    }
    public function user(){
        return $this->belongsToMany(User::class)->withPivot("transaction_id","etat");
    }
    public function abonnement(){
        return $this->belongsToMany(abonnement::class,"service_abonnements");
    }
   
}
