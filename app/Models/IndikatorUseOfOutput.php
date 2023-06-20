<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorUseOfOutput extends Model
{
    use HasFactory;
    protected $table = "indikator_use_of_output";
    
    protected $primaryKey = 'id_indikator_use_of_output';

    protected $fillable = [
        'id_use_of_output',
        'deskripsi_indikator_use_of_output'
    ];

    public $timestamps = false;

    public function use_of_output(){
        return $this->belongsTo(UseOfOutput::class, 'id_indikator_use_of_output');
    }

    public function capaian_use_of_output(){
        return $this->hasMany(CapaianIndikatorUseOfOutput::class,'id_indikator_use_of_output');
    }
}
