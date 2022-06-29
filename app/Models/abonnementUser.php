<?php

namespace App\Models;

use App\Models\User;
use App\Models\abonnement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class abonnementUser extends Pivot
{
    protected $table = 'abonnement_users';
    use HasFactory;
    protected $guarded=[];
    protected $dates=['created_at','updated_at','date_debut','date_fin'];

    public function abonnement(){
        return $this->belongsTo(abonnement::class,'abonnement_users');
    }
    public function user(){
        return $this->belongsTo(User::class,'abonnement_users');
    }
}
