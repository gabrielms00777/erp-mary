<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    public Product $product;

    #[Validate('required|string|max:255')]
    public ?string $name = null;

    #[Validate('required|integer|exists:product_types,id')]
    public ?int $product_type_id = null;

    #[Validate('required|integer|exists:suppliers,id')]
    public ?int $supplier_id = null;

    #[Validate('nullable|string|max:255')]
    public ?string $barcode = null;

    #[Validate('required|integer|exists:units,id')]
    public ?int $unit_id = null;

    #[Validate('required|numeric|min:0')]
    public ?float $net_weight = null;

    #[Validate('required|numeric|min:0')]
    public ?float $gross_weight = null;

    #[Validate('required|numeric|min:0')]
    public ?float $cost_price = null;

    #[Validate('required|numeric|min:0')]
    public ?float $sale_price = null;

    #[Validate('required|integer|min:0')]
    public ?int $min_stock = null;

    #[Validate('required|integer|min:0')]
    public ?int $max_stock = null;

    #[Validate('required|integer|min:0')]
    public ?int $current_stock = null;

    #[Validate('nullable|string')]
    public ?string $observation = null;

    public function setProduct($product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->product_type_id = $product->product_type_id;
        $this->supplier_id = $product->supplier_id;
        $this->barcode = $product->barcode;
        $this->unit_id = $product->unit_id;
        $this->net_weight = $product->net_weight;
        $this->gross_weight = $product->gross_weight;
        $this->cost_price = $product->cost_price;
        $this->sale_price = $product->sale_price;
        $this->min_stock = $product->min_stock;
        $this->max_stock = $product->max_stock;
        $this->current_stock = $product->current_stock;
        $this->observation = $product->observation;
    }

    public function store()
    {
        $this->validate();

        // dd($this->all());

        Product::create($this->all());
    }

    public function update()
    {
        $this->validate();

        $this->product->update($this->all());
    }
}
