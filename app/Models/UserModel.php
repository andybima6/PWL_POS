<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_users';
    protected $primarykey = 'user_id';

    protected $fillable = ['level_id', 'username', 'nama'];
}
