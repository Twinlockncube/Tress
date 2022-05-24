<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $items = array(0,1);
        $classes = array("1A1","2A1","3A1","4A1");
        return [
          'last_name'=> $this->faker->name(),
          'name'=> $this->faker->name(),
          'address' => $this->faker->address(),
          'dob' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
          'gender' => $this->faker->randomElement($items),
          'email' => $this->faker->unique()->safeEmail(),
          'birth' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
          'nid'  => $this->faker->text(10),
          'id' => "SD".$this->faker->unique()->numberBetween(1000,9000),
          'sponsor_id'  => $this->faker->text(10),
          'guardian_id'  => $this->faker->text(10),
          'created_at' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
          'updated_at' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
          'class_group_id' =>$this->faker->randomElement($classes),
        ];
    }
}
