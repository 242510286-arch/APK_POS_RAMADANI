<?php

namespace App\Services;

use App\Models\Produk;

class MonitoringStokService
{
    /**
     * Mengambil produk dengan stok rendah
     * Stok > 0 dan <= 5
     */
    public function produkStokRendah()
    {
        return Produk::where('stok', '>', 0)
            ->where('stok', '<=', 5)
            ->paginate(10);
    }

    /**
     * Mengambil produk yang stoknya habis
     */
    public function produkStokHabis()
    {
        return Produk::where('stok', '<=', 0)
            ->paginate(10);
    }
}