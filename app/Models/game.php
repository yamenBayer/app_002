<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    use HasFactory;
    protected $table = 'games';

    public function category(){
        return $this->belongsTo(category::class);
    }
    public function order(){
        return $this->belongsTo(order::class);
    }
}
