<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class  LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_levels';
    protected $primaryKey = 'level_id';

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
