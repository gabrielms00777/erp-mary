<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'product_type_id', 'supplier_id', 'barcode',
        'unit_id', 'net_weight', 'gross_weight',
        'cost_price', 'sale_price',
        'min_stock', 'max_stock', 'current_stock',
        'observation',
    ];

    // Relacionamentos
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
