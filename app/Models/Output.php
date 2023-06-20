<?php

namespace App\Models;

use App\Models\Periode;
use App\Models\UseOfOutput;
use App\Models\IndikatorOutput;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Output extends Model
{
    use HasFactory;
    protected $table = "output";
    
    protected $primaryKey = 'id_output';

    protected $fillable = [
        'id_use_of_output',
        'id_outcome',
        'id_periode',
        'strategi_output'
    ];

    public $timestamps = false;

    public function periode(){
        return $this -> belongsTo(Periode::class,'id_output');
    }

    public function use_of_output() {
        return $this -> belongsTo(UseOfOutput::class,'id_output');
    }

    public function outcome() {
        return $this -> belongsTo(Outcome::class,'id_output');
    }
    public function indikator_output() {
        return $this -> hasMany(IndikatorOutput::class,'id_output');
    }
}
