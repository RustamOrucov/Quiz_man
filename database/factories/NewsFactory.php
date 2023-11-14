<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition()
    {
        $rnd = rand(1,50);
        return [
            'status' => $this->faker->boolean(),
            'category_id' => $rnd,
            'view_count' => $this->faker->numberBetween(0, 100),
            'en' => json_encode([  // İngilizce dil çevirileri
                'title' => $this->faker->sentence(2),
                'description' => $this->faker->text(5),
            ]),
            'fr' =>json_encode([  // Fransızca dil çevirileri
                'title' => $this->faker->sentence(2),
                'description' => $this->faker->text(5),
            ]),
            'az' =>json_encode( [  // Azerice dil çevirileri
                'title' => $this->faker->sentence(2),
                'description' => $this->faker->text(5),
            ]),
            'ru' =>json_encode([  // Rusça dil çevirileri
                'title' => $this->faker->sentence(2),
                'description' => $this->faker->text(5),
            ]),
        ];
    }
}
