<?php

namespace App\Models;

use App\Models\Periode;
use App\Models\GeneralObjective;
use App\Models\IndikatorUltimate;
use App\Models\IntermediateObjective;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UltimateObjective extends Model
{
    use HasFactory;
    protected $table = "ultimate_objective";
    
    protected $primaryKey = 'id_ultimate';

    protected $fillable = [
        'id_general',
        'id_periode',
        'strategi_ultimate',
    ];

    public $timestamps = false;

    public function periode(){
        return $this -> belongsTo(Periode::class,'id_ultimate');
    }
    
    public function general_objective(){
        return $this -> belongsTo(GeneralObjective::class,'id_ultimate');
    }

    public function intermediate_objective(){
        return $this -> hasMany(IntermediateObjective::class,'id_ultimate');
    }

    public function indikator_ultimate(){
        return $this -> hasMany(IndikatorUltimate::class,'id_ultimate');
    }
}
