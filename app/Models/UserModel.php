<?php

namespace App\Models;

use App\Models\LevelModel;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable implements JWTSubject
{
    // Jobsheet 9 prak 1
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    protected $table = 'm_barangs';        // Mendefinisikan nama tabel yang digunakan untuk model ini
    protected $primaryKey = 'barang_id';  // Mendefinisikan primary key dari tabel yang digunakan

    protected $fillable = ['barang_id', 'kategori_id', 'barang_kode', 'barang_nama', 'harga_beli','harga_jual','image'];
    // protected $fillable = ['level_id', 'username', 'nama'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }
}
