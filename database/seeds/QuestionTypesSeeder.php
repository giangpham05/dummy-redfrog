<?php

use Illuminate\Database\Seeder;
use App\Models\QuestionType;

class QuestionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionType::truncate();
        $types = array("paragraph", "short_answer", "check_boxes","multiple","linear_scale");
        for ($i = 0; $i<count($types);$i++){
            QuestionType::create([
                'strTypeName' =>$types[$i],
            ]);
        }
    }
}
