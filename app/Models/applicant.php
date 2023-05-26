<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicant extends Model
{
    protected $fillable = [
        '_token',
        // other fillable attributes...
    ];


    use HasFactory;

    /**
     * Summary of academics
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function academics()
    {
        return $this->hasMany(academic::class, 'applicant_id', 'id');
        }
    }
