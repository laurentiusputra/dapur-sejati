<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $guarded = [];

    /**
     * Menghubungkan data Order kembali ke data Product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
