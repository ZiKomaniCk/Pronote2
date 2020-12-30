<?php

use App\Promotion;
use App\Student;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Promotion::class, 5)->create()->each(function ($promotion){
            $promotion->save();

            factory(Student::class, 2)->create([
                "promotion_id" => $promotion->id,
            ]);

        });
    }
}
