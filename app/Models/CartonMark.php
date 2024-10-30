<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartonMark extends Model
{
    use HasFactory;
    protected $table='carton_marks';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
