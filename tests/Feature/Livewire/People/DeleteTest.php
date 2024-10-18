<?php

namespace Tests\Feature\Livewire\Person;

use App\Livewire\Person\Delete;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Delete::class)
            ->assertStatus(200);
    }
}
