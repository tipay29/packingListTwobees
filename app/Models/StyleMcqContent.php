<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StyleMcqContent extends Model
{
    use HasFactory;
    protected $table='style_mcq_contents';
    protected $guarded = [];

    public function style(){
        return $this->belongsTo(Style::class);
    }
}
