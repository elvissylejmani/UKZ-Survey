<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\survey;

class TestCase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $g1 = App\group::create([
                'Name' => 'L1',
                'Class_ID' => 2,
                'Prof_ID' => 3,
                'type' => 1
        ]);

       $S1id = App\survey::create([
            'SurveyTitle' => 'vlersimi i Profesorit:',
            'Group_ID' => $g1['id']
        ]);
        $Q1id = App\question::create([
            'Survey_ID' => $S1id['id'],
            'question' => 'Vijimi i mësimdhënsit gjatë semestrit ka qenë i rregullt'
        ]);
        $Q2id = App\question::create([
            'Survey_ID' => $S1id['id'],
            'question' => 'Aktivitetet gjatë semestrit kanë krijuar mundësi që studentët të angazhohen në diskutime, projekte, si dhe është inkurajuar ndërveprimi i studentëve(puna në grupe, dyshe etj)'
        ]);
        $Q3id = App\question::create([
            'Survey_ID' => $S1id['id'],
            'question' => 'Mësimdhënësi  i inkurajon mendimet e ndryshme të studentëve dhe i respekton ato'
        ]);
        $Q4id = App\question::create([
            'Survey_ID' => $S1id['id'],
            'question' => 'Materialet e ofruara për studime gjatë semestrit ishin të përshtatshme për për përvetësimin e njohurive dhe të shkathtësive të parapara për këtë lëndë'
        ]);
        $Q5id = App\question::create([
            'Survey_ID' => $S1id['id'],
            'question' => 'Vlerësimi i punës së studentëve për lëndën është bërë në vazhdimësi për gjatë semestrit e jo vetëm në provimin përfundimtar'
        ]);
        $Q6id = App\question::create([
            'Survey_ID' => $S1id['id'],
            'question' => 'Lënda ka qenë e suksesshme dhe e dobishme për studentët'
        ]);
        $Q7id = App\question::create([
            'Survey_ID' => $S1id['id'],
            'question' => 'Sa ka qen korrekt profesori në orarin e ligjeratave'
        ]);
        $Q8id = App\question::create([
            'Survey_ID' => $S1id['id'],
            'question' => 'Mësimdhënësi ka ardhur gjithmonë i përgaditur në mësim'
        ]);

        DB::table('answers')->insert([
            'Question_ID' => $Q1id['id'],
            'Answer' => 5,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q1id['id'],
            'Answer' => 5,
            'StudentSet' => 5
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q1id['id'],
            'Answer' => 4,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q1id['id'],
            'Answer' => 2,
            'StudentSet' => 2
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q1id['id'],
            'Answer' => 5,
            'StudentSet' => 3
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q1id['id'],
            'Answer' => 5,
            'StudentSet' => 1
        ]);

        DB::table('answers')->insert([
            'Question_ID' => $Q2id['id'],
            'Answer' => 5,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q2id['id'],
            'Answer' => 5,
            'StudentSet' => 5
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q2id['id'],
            'Answer' => 4,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q2id['id'],
            'Answer' => 2,
            'StudentSet' => 2
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q2id['id'],
            'Answer' => 5,
            'StudentSet' => 3
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q2id['id'],
            'Answer' => 5,
            'StudentSet' => 1
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q3id['id'],
            'Answer' => 5,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q3id['id'],
            'Answer' => 4,
            'StudentSet' => 5
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q3id['id'],
            'Answer' => 4,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q3id['id'],
            'Answer' => 2,
            'StudentSet' => 2
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q3id['id'],
            'Answer' => 5,
            'StudentSet' => 3
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q3id['id'],
            'Answer' => 5,
            'StudentSet' => 1
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q4id['id'],
            'Answer' => 5,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q4id['id'],
            'Answer' => 5,
            'StudentSet' => 5
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q4id['id'],
            'Answer' => 4,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q4id['id'],
            'Answer' => 2,
            'StudentSet' => 2
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q4id['id'],
            'Answer' => 5,
            'StudentSet' => 3
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q4id['id'],
            'Answer' => 5,
            'StudentSet' => 1
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q5id['id'],
            'Answer' => 5,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q5id['id'],
            'Answer' => 5,
            'StudentSet' => 5
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q5id['id'],
            'Answer' => 4,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q5id['id'],
            'Answer' => 2,
            'StudentSet' => 2
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q5id['id'],
            'Answer' => 5,
            'StudentSet' => 3
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q5id['id'],
            'Answer' => 5,
            'StudentSet' => 1
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q6id['id'],
            'Answer' => 5,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q6id['id'],
            'Answer' => 4,
            'StudentSet' => 5
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q6id['id'],
            'Answer' => 4,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q6id['id'],
            'Answer' => 2,
            'StudentSet' => 2
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q6id['id'],
            'Answer' => 5,
            'StudentSet' => 3
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q6id['id'],
            'Answer' => 5,
            'StudentSet' => 1
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q7id['id'],
            'Answer' => 5,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q7id['id'],
            'Answer' => 5,
            'StudentSet' => 5
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q7id['id'],
            'Answer' => 4,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q7id['id'],
            'Answer' => 2,
            'StudentSet' => 2
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q7id['id'],
            'Answer' => 5,
            'StudentSet' => 3
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q7id['id'],
            'Answer' => 5,
            'StudentSet' => 1
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q8id['id'],
            'Answer' => 5,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q8id['id'],
            'Answer' => 3,
            'StudentSet' => 5
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q8id['id'],
            'Answer' => 4,
            'StudentSet' => 4
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q8id['id'],
            'Answer' => 2,
            'StudentSet' => 2
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q8id['id'],
            'Answer' => 5,
            'StudentSet' => 3
        ]);
        DB::table('answers')->insert([
            'Question_ID' => $Q8id['id'],
            'Answer' => 5,
            'StudentSet' => 1
        ]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 3,
            'StudentSet' => 5
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 4,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 2,
            'StudentSet' => 2
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 3
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 1
       ,  'Prof_ID' =>3
]);

        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 3,
            'StudentSet' => 5
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 4,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 2,
            'StudentSet' => 2
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 3
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 1
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 3,
            'StudentSet' => 5
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 4,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 2,
            'StudentSet' => 2
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 3
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 1
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 1,
            'StudentSet' => 5
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 4,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 2,
            'StudentSet' => 2
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 3
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 1
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 5
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 4,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 2,
            'StudentSet' => 2
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 3
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 1
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 3,
            'StudentSet' => 5
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 4,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 2,
            'StudentSet' => 2
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 3
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 1
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 5
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 4,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 2,
            'StudentSet' => 2
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 3
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 1
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 3,
            'StudentSet' => 5
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 4,
            'StudentSet' => 4
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 2,
            'StudentSet' => 2
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 3
       ,  'Prof_ID' =>3
]);
        DB::table('fuzzy_ratings')->insert([
            
            'AverageOfAnswers' => 5,
            'StudentSet' => 1
       ,  'Prof_ID' =>3
]);
    }
}
