<?php

namespace App\Models;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class stockModel extends Model
{
    protected $table = 't-stoks';

    protected $primaryKey = 'stok_id';

    protected $fillable = ['stok_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah', 'created_at', 'updated_at'];

    public function user(): HasMany
    {
        return $this->hasMany(UserModel::class, 'user_id', 'user_id');
    }
    public function barang(): HasMany
    {
        return $this->hasMany(barangModel::class, 'barang_id', 'barang_id');
    }
}
