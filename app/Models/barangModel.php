<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barangModel extends Model
{
    protected $table = 'm_barangs';

    protected $primaryKey = 'barang_id';

    protected $fillable = ['barang_id','kategori_id', 'barang_kode', 'barang_nama','harga_beli','harga_jual'];

    public function kategori(): HasMany
    {
        return $this->hasMany(kategoriModel::class, 'kategori_id', 'kategori_id');
    }
}

