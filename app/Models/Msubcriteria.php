<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msubcriteria extends Model
{
    use HasFactory;
    protected $fillable = ['code_subcriteria', 'name_subcriteria', 'value_subcriteria', 'criteria_id'];

    public function criteria()
    {
        return $this->belongsTo(Mcriteria::class);
    }
}
