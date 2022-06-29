<?php

namespace App\Models;

use App\Models\User;
use App\Models\service;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class abonnement extends Model
{
    use PowerJoins;
    use HasFactory;
    protected $guarded=[];
    
    public function user(){
        return $this->belongsToMany(User::class,'abonnement_users')->withPivot('etat','date_debut','date_fin');
    }
    public function service(){
        return $this->belongsToMany(service::class,"service_abonnements");
    }
}
