<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorGeneral extends Model
{
    use HasFactory;

    protected $table = "indikator_general";
    
    protected $primaryKey = 'id_indikator_general';

    protected $fillable = [
        'id_general',
        'deskripsi_indikator_general'
    ];

    public $timestamps = false;

    public function general_objective(){
        return $this->belongsTo(GeneralObjective::class, 'id_indikator_general');
    }

    public function capaian_general(){
        return $this->hasMany(CapaianIndikatorGeneral::class,'id_indikator_general');
    }
}
