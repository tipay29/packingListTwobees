<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;
    protected $table='styles';
    protected $guarded = [];

    public function mcq_contents(){
        return $this->hasMany(StyleMcqContent::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
