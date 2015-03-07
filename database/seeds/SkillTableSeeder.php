<?php

use Illuminate\Database\Seeder;
use ThreeAccents\Tools\Slugger\Slugger;

class SkillTableSeeder extends Seeder {

    use Slugger;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \ThreeAccents\Users\Entities\Skill::unguard();

        $skills = ['PHP', 'Python', 'Java', 'AngularJS', 'EmberJs', 'C#', 'C++', 'C', 'Objective-C', 'Swift', 'Pearl'];

        foreach($skills as $skill)
        {
            \ThreeAccents\Users\Entities\Skill::create([
                'name' => $skill,
                'slug' => strtolower($skill)
            ]);
        }
    }

}
