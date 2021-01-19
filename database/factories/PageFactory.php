<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->get()->first()->id,
            'menu_title' => $this->faker->text(10, $indexSize = 5),
            'title' => $this->faker->text(30),
            'text' => $this->faker->realText(5000)
        ];
    }
}
