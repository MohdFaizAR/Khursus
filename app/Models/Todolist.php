<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $table = 'todolists';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = ['id'];

    /**
     * Get the user that owns the todolist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() // shortcut rel
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        // return this --> belongsto ('APP\User', 'foreign_key, 'other_key')
    }

}
