<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorIntermediate extends Model
{
    use HasFactory;
    protected $table = "indikator_intermediate";
    
    protected $primaryKey = 'id_indikator_intermediate';

    protected $fillable = [
        'id_intermediate',
        'deskripsi_indikator_intermediate'
    ];

    public $timestamps = false;

    public function intermediate_objective(){
        return $this->belongsTo(IntermediateObjective::class, 'id_indikator_intermediate');
    }

    public function capaian_intermediate(){
        return $this->hasMany(CapaianIndikatorIntermediate::class,'id_indikator_intermediate');
    }
}
