<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class LevelModel extends Model
{
    protected $table = 'm_levels';

    protected $primaryKey = 'level_id';

    protected $fillable = ['user_id', 'level_id', 'level_code', 'level_code_nama'];

    public function user(): HasMany
    {
        return $this->hasMany(UserModel::class, 'level_id', 'level_id');
    }
}
