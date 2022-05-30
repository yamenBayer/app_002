<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'orders';
    use HasFactory;
    public function game(){
        return $this->hasMany(game::class);
    }
    public function user(){
        return $this->hasMany(user::class);
    }
}
