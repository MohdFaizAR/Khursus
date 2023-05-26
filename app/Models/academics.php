<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class academics extends Model
{
    use HasFactory;

    public function applicant()
    {
        return $this->hasMany(applicant::class, 'applicant_id', 'id');
        }
}
