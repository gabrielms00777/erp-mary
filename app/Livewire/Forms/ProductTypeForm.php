<?php

namespace App\Livewire\Forms;

use App\Models\ProductType;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductTypeForm extends Form
{
    public ?ProductType $productType;

    #[Validate(['required', 'max:255', 'string'])]
    public ?string $name;

    public function setProductType($productType)
    {
        $this->productType = $productType;
        $this->name = $productType->name;
    }

    public function store()
    {
        $this->validate();

        ProductType::create($this->all());
    }

    public function update()
    {
        $this->validate();

        $this->productType->update($this->all());
    }
}
