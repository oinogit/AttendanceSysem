<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Attendance;

class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dummyDate = $this->faker->dateTimeThisMonth;

        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'date' => $dummyDate->format('Y-m-d'),
            'start_time' => $dummyDate->format('H:i:s'),
            'end_time' => $dummyDate->modify('+9hour')->format('H:i:s'),
        ];
    }
}
