<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $table='batches';
    protected $guarded = [];

    public function packing_lists(){
        return $this->hasMany(PackingList::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
