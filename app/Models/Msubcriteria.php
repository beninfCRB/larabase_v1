<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msubcriteria extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name', 'value', 'criteria_id'];

    public function criteria()
    {
        return $this->belongsTo(Mcriteria::class);
    }
}
