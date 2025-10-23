<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    use HasFactory;

    // custom table name
    protected $table = 'inventory';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'quantity',
    ];

    /**
     * Get the product that owns the inventory record.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
