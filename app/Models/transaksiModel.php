<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransaksiModel extends Model
{
    use HasFactory;

    protected $table = 't-penjualans';        // Mendefinisikan nama tabel yang digunakan untuk model ini
    protected $primaryKey = 'penjualan_id';  // Mendefinisikan primary key dari tabel yang digunakan

    protected $fillable = ['user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
    public function detail(): BelongsTo
    {
        return $this->belongsTo(DetailModel::class, 'detail_id', 'detail_id');
    }
}
