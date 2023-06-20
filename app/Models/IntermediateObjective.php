<?php

namespace App\Models;

use App\Models\Outcome;
use App\Models\Periode;
use App\Models\UltimateObjective;
use App\Models\IndikatorIntermediate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IntermediateObjective extends Model
{
    use HasFactory;

    protected $table = "intermediate_objective";
    
    protected $primaryKey = 'id_intermediate';

    protected $fillable = [
        'id_ultimate',
        'id_periode',
        'strategi_intermediate',
    ];

    public $timestamps = false;

    public function periode(){
        return $this -> belongsTo(Periode::class,'id_intermediate');
    }

    public function ultimate_objective(){
        return $this -> belongsTo(UltimateObjective::class,'id_intermediate');
    }

    public function outcome(){
        return $this -> hasMany(Outcome::class,'id_intermediate');
    }

    public function indikator_intermediate(){
        return $this -> hasMany(IndikatorIntermediate::class,'id_intermediate');
    }
}
