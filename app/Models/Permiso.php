<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $table = "permisos";
    protected $fillable = [
        'permisos',
    ];

    public $timestamps = false;
    
    // Relationships
    public function roles()
    {
        return $this->belongsToMany(Rol::class);
    }

}
