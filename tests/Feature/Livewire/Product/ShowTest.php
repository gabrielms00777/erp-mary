<?php

namespace Tests\Feature\Livewire\Product;

use App\Livewire\Product\Show;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Show::class)
            ->assertStatus(200);
    }
}