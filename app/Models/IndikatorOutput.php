<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorOutput extends Model
{
    use HasFactory;
    protected $table = "indikator_output";
    
    protected $primaryKey = 'id_indikator_output';

    protected $fillable = [
        'id_output',
        'deskripsi_indikator_output'
    ];

    public $timestamps = false;

    public function output(){
        return $this->belongsTo(Output::class, 'id_indikator_output');
    }

    public function capaian_output(){
        return $this->hasMany(CapaianIndikatorOutput::class,'id_indikator_output');
    }
}
