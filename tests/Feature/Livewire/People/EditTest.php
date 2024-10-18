<?php

namespace Tests\Feature\Livewire\Person;

use App\Livewire\Person\Edit;
use Livewire\Livewire;
use Tests\TestCase;

class EditTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Edit::class)
            ->assertStatus(200);
    }
}
