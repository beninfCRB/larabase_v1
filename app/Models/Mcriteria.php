<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcriteria extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name', 'value', 'type_id'];

    public function type()
    {
        return $this->belongsTo(Mtype::class);
    }

    public function subcriteria()
    {
        return $this->hasMany(Msubcriteria::class, 'fk_subcriteria');
    }
}
