<?php

namespace Database\Factories\V1;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\V1\Customer;

class CustomerFactory extends Factory
{

    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_customer' => $this->faker->name(),
            'email_customer' => $this->faker->unique()->safeEmail(),
            'phone_customer' => $this->faker->phoneNumber(),
            'birth_customer' => '21-09-01',
            'password_customer' => '12345678',
            'address_customer' =>$this->faker->address(),
            'avatar_customer' => $this->faker->image()

        ];
    }
}
