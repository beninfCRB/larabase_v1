<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleData extends Model
{
    use HasFactory;
    protected $fillable = ['alternative_id', 'criteria_id', 'value'];

    public function alternative()
    {
        return $this->belongsTo(Malternative::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Mcriteria::class);
    }
}
