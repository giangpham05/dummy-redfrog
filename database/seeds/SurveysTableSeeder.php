<?php

use Illuminate\Database\Seeder;
use App\Models\Survey;
class SurveysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        Survey::truncate();

        $users = DB::table('users')->where('role', '1')->get()->pluck('id')->toArray();

        foreach (range(1,20) as $index)
        {
            $rand_keys = array_rand($users);
            $id_selected = $users[$rand_keys];
            $strSurveyName = $faker->sentence();
            Survey::create([
                'user_id' => (int)$id_selected,
                'strSurveyName' => $strSurveyName,
                'strSurveyDesc' => $faker->paragraph(3),
                'slug' => str_slug($strSurveyName, '-'),

            ]);

//            $survey = new Survey();
//            $survey['user_id'] = (int)$id_selected;
//            $survey['strSurveyName'] = $strSurveyName;
//            $survey['strSurveyDesc'] = $faker->paragraph(3);
//            $survey['slug'] = str_slug($strSurveyName, '-');
//            $survey->save();
        }


    }
}
