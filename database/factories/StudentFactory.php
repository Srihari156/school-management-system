<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dob = $this->faker->dateTimeBetween('-18 years', '-10 years')->format('y-m-d');
        $age = now()->diff(new \DateTime($dob))->y;
        return [
            'name' => $this->faker->name(),
            'age' => $age,
            'dob' => $dob,
            'father_name' => $this->faker->name('male'),
            'mother_name' => $this->faker->name('female'),
            'district' => $this->faker->city(),
            'city' => $this->faker->city(),
            'state' => $this->faker->randomElement([
                 'Tamilnadu', 'Kerala', 'Andra Pradesh', 'Karnataka', 
                'Delhi', 'Bihar', 'Punjab', 'Goa', 'Manipur', 'Uttar pradesh'
            ]),
            'nationality' => 'Indian',
            'father_occupation' => $this->faker->jobTitle(),
            'mother_occupation' => $this->faker->jobTitle(),
            'mobile_no' => $this->faker->numerify('##########'),
            'address' => $this->faker->address(),
            'bloodgroup' => $this->faker->randomElement([
                'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'
            ]),
            'class_id' => $this->faker->numberBetween(1, 42)
        ];
    }
}
