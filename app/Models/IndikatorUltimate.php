<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorUltimate extends Model
{
    use HasFactory;
    protected $table = "indikator_ultimate";
    
    protected $primaryKey = 'id_indikator_ultimate';

    protected $fillable = [
        'id_ultimate',
        'deskripsi_indikator_ultimate'
    ];

    public $timestamps = false;

    public function ultimate_objective(){
        return $this->belongsTo(UltimateObjective::class, 'id_indikator_ultimate');
    }

    public function capaian_ultimate(){
        return $this->hasMany(CapaianIndikatorUltimate::class,'id_indikator_ultimate');
    }
}
