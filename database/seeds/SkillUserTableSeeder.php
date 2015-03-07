<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/15/15
 * Time: 8:20 PM
 */

class SkillUserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("SET foreign_key_checks = 0");

        \ThreeAccents\Users\Entities\Skill::unguard();

        $skills = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];

        foreach($skills as $skill)
        {
            DB::table('skill_user')->insert([
                'user_id' => 1,
                'skill_id' => $skill
            ]);
        }
    }

}