<?php

namespace Database\Factories;
use App\Models\Contact;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;
// use Faker\Factory as FakerFactory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $categoryId = Category::inRandomOrder()->value('id') ?? 1;

        return [
            'category_id' => $categoryId,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->unique()->safeEmail,
            'tel' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'building' => $this->faker->optional()->secondaryAddress,
            'detail' => $this->faker->realText(200),
        ];
    }
}
