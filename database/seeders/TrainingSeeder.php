<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('training_styles')->delete();
        $training_styles = array(
            array('id' => 1,'title' => 'Careful' ,'description' => "Afrikaans"),
            array('id' => 2,'title' => 'Witty' ,'description' => "Albanian"),
            array('id' => 3,'title' => 'Understanding' ,'description' => "Arabic"),
            array('id' => 4,'title' => 'Cycling' ,'description' => "Armenian"),
            array('id' => 5,'title' => 'Supportive' ,'description' => "Basque"),
            array('id' => 6,'title' => 'Tough' ,'description' => "Bengali"),
            array('id' => 7,'title' => 'Suppliments' ,'description' => "Bulgarian"),
            array('id' => 8,'title' => 'Powerlifting' ,'description' => "Catalan"),
            array('id' => 9,'title' => 'Boxing' ,'description' => "Cambodian"),
            array('id' => 10,'title' => 'Strict','description' => "Chinese(Mandarin)"),
            array('id' => 11,'title' => 'Stern' ,'description' => "Croatian"),
            array('id' => 12,'title' => 'Sincere' ,'description' => "Czech"),
            array('id' => 13,'title' => 'Respectful' ,'description' => "Danish"),
            array('id' => 14,'title' => 'Reliable' ,'description' => "Dutch"),
            array('id' => 15,'title' => 'Quirky' ,'description' => "English"),
            array('id' => 16,'title' => 'Polite' ,'description' => "Estonian"),
            array('id' => 17,'title' => 'Patient' ,'description' => "Fiji"),
            array('id' => 18,'title' => 'Organised' ,'description' => "Finnish"),
            array('id' => 19,'title' => 'Old-fashioned' ,'description' => "French"),
            array('id' => 20,'title' => 'Kind' ,'description' => "Georgian"),
            array('id' => 21,'title' => 'Intense' ,'description' => "German"),
            array('id' => 22,'title' => 'Impulsive' ,'description' => "Greek"),
            array('id' => 23,'title' => 'Honest' ,'description' => "Gujarati"),
            array('id' => 24,'title' => 'Formal' ,'description' => "Hebrew"),
            array('id' => 25,'title' => 'Fiery' ,'description' => "Hindi"),
            array('id' => 26,'title' => 'Experimental' ,'description' => "Hungarian"),
            array('id' => 27,'title' => 'Energetic' ,'description' => "Icelandic"),
            array('id' => 28,'title' => 'Easygoing' ,'description' => "Indonesian"),
            array('id' => 29,'title' => 'Conservative' ,'description' => "Irish"),
            array('id' => 30,'title' => 'Confident' ,'description' => "Italian"),
            array('id' => 31,'title' => 'Compassionate' ,'description' => "Indonesian"),
            array('id' => 32,'title' => 'Cheerful' ,'description' => "Irish"),
            array('id' => 33,'title' => 'Casual' ,'description' => "Italian"),
            array('id' => 34,'title' => 'Caring' ,'description' => "Italian"),
            array('id' => 35,'title' => 'Drill sergeant trainer' ,'description' => "Drill sergeant trainer"),
            array('id' => 36,'title' => 'supportive trainer' ,'description' => "supportive trainer"),
            array('id' => 37,'title' => 'educator' ,'description' => "educator")
        );
        \DB::table('training_styles')->insert($training_styles);
    }

}
