<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Malternative extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name'];

    public function sample_data()
    {
        return $this->hasMany(SampleData::class, 'fk_sample_data');
    }
}
