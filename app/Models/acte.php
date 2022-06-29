<?php

namespace App\Models;

use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class acte extends Model
{
    use PowerJoins;
    use HasFactory;
    protected $guarded=[];

    public function service(){
        return $this->belongsToMany(service::class,'acte_services');
    }
}
