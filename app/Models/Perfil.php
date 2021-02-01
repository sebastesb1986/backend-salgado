<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = "profiles";
    protected $fillable = [
        'name', 'lastname', 'phone', 'address', 'user_id'
    ];

    public $timestamps = false;
    
    public function usuario(){

    	return $this->belongsTo(User::class);

    }

}
