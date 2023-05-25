<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msample extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'value', 'type_id'];

    public function type()
    {
        return $this->belongsTo(Mtype::class);
    }
}
