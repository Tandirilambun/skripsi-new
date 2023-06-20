<?php

namespace App\Models;

use App\Models\Periode;
use App\Models\UseOfOutput;
use App\Models\IndikatorOutcome;
use App\Models\IntermediateObjective;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Outcome extends Model
{
    use HasFactory;
    protected $table = "outcome";
    
    protected $primaryKey = 'id_outcome';

    protected $fillable = [
        'id_intermediate',
        'id_periode',
        'strategi_outcome'
    ];

    public $timestamps = false;

    public function periode(){
        return $this -> belongsTo(Periode::class,'id_outcome');
    }

    public function intermediate_objective() {
        return $this -> belongsTo(IntermediateObjective::class,'id_outcome');
    }

    public function use_of_output(){
        return $this -> hasMany(UseOfOutput::class,'id_outcome');
    }

    public function output(){
        return $this -> hasMany(Output::class,'id_outcome');
    }

    public function indikator_outcome(){
        return $this -> hasMany(IndikatorOutcome::class,'id_outcome');
    }
}
