<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtype extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'code', 'name'];

    public function criteria()
    {
        return $this->hasMany(Mcriteria::class, 'fk_criterias');
    }
}
