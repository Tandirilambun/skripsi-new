<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $table = "activity_log";

    protected $primaryKey = 'id_activity';

    protected $fillable = [
        'locations_log',
        'details_log',
        'tipe_log',
        'after_change',
        'created_at',
    ];

    public $timestamps = false;
}
