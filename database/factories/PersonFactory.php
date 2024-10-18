<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'document' => $this->faker->numerify('###.###.###-##'),
            'user_type' => 'User',
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'observation' => $this->faker->sentence,
            'state' => $this->faker->state,
            'city' => $this->faker->city,
            'neighborhood' => $this->faker->word,
            'street' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'complement' => $this->faker->secondaryAddress,
            'zipcode' => $this->faker->postcode,
            'activation_date' => $this->faker->date,
            'deactivation_date' => $this->faker->optional()->date,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Person $person) {
            $groups = Group::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $person->groups()->sync($groups);
        });
    }
}
