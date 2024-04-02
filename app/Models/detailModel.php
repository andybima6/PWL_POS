<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailModel extends Model
{
    use HasFactory;

    protected $table = 't-penjualan_details';        // Mendefinisikan nama tabel yang digunakan untuk model ini
    protected $primaryKey = 'detail_id';  // Mendefinisikan primary key dari tabel yang digunakan

    protected $fillable = ['penjualan_id', 'barang_id', 'harga', 'jumlah'];

    public function penjualan(): BelongsTo
    {
        return $this->belongsTo(TransaksiModel::class, 'penjualan_id', 'penjualan_id');
    }
    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}
