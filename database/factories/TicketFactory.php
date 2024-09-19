<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->randomElement(['late', 'need watch', 'very good']),
            'creator_id' => User::inRandomOrder()->first()->id, // Random user as creator
            'assigned_user_id' =>  User::inRandomOrder()->first()->id, // Random user as assignee
            'status' => $this->faker->randomElement(['pending', 'OnGoing', 'finished']),
            'dead_line' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
