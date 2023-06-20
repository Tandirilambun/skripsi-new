<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorOutcome extends Model
{
    use HasFactory;
    protected $table = "indikator_outcome";
    
    protected $primaryKey = 'id_indikator_outcome';

    protected $fillable = [
        'id_outcome',
        'deskripsi_indikator_outcome'
    ];

    public $timestamps = false;

    public function outcome(){
        return $this->belongsTo(Outcome::class, 'id_indikator_outcome');
    }

    public function capaian_outcome(){
        return $this->hasMany(CapaianIndikatorOutcome::class,'id_indikator_outcome');
    }
}
