<?php

namespace App\Models;

use App\Models\Periode;
use App\Models\IndikatorGeneral;
use App\Models\IntermediateObjective;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GeneralObjective extends Model
{
    use HasFactory;
    protected $table = "general_objective";
    
    protected $primaryKey = 'id_general';

    protected $fillable = [
        'id_periode',
        'strategi_general'
    ];

    public $timestamps = false;

    public function periode(){
        return $this -> belongsTo(Periode::class,'id_general');
    }

    public function ultimate_objective(){
        return $this -> hasMany(IntermediateObjective::class,'id_general');
    }

    public function indikator_general(){
        return $this -> hasMany(IndikatorGeneral::class,'id_general');
    }
}
