<?php

namespace Tests\Feature\Livewire\Group;

use App\Livewire\Group\Delete;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
