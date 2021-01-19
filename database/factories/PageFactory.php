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
            'menu_title' => $this->faker->realText(10, $indexSize = 2),
            'title' => $this->faker->realText(30, $indexSize = 2),
            'text' => $this->faker->text
        ];
    }
}
