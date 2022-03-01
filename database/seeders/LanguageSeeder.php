<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run()
    {
            \DB::table('languages')->delete();
            $languages = array(
                array('id' => 1,'code' => 'AF' ,'name' => "Afrikaans"),
                array('id' => 2,'code' => 'SQ' ,'name' => "Albanian"),
                array('id' => 3,'code' => 'AR' ,'name' => "Arabic"),
                array('id' => 4,'code' => 'AS' ,'name' => "Armenian"),
                array('id' => 5,'code' => 'EU' ,'name' => "Basque"),
                array('id' => 6,'code' => 'BN' ,'name' => "Bengali"),
                array('id' => 7,'code' => 'BG' ,'name' => "Bulgarian"),
                array('id' => 8,'code' => 'CA' ,'name' => "Catalan"),
                array('id' => 9,'code' => 'KM' ,'name' => "Cambodian"),
                array('id' => 10,'code' => 'ZH','name' => "Chinese(Mandarin)"),
                array('id' => 11,'code' => 'HR' ,'name' => "Croatian"),
                array('id' => 12,'code' => 'CS' ,'name' => "Czech"),
                array('id' => 13,'code' => 'DA' ,'name' => "Danish"),
                array('id' => 14,'code' => 'NL' ,'name' => "Dutch"),
                array('id' => 15,'code' => 'EN' ,'name' => "English"),
                array('id' => 16,'code' => 'ET' ,'name' => "Estonian"),
                array('id' => 17,'code' => 'FJ' ,'name' => "Fiji"),
                array('id' => 18,'code' => 'FI' ,'name' => "Finnish"),
                array('id' => 19,'code' => 'FR' ,'name' => "French"),
                array('id' => 20,'code' => 'KA' ,'name' => "Georgian"),
                array('id' => 21,'code' => 'DE' ,'name' => "German"),
                array('id' => 22,'code' => 'EL' ,'name' => "Greek"),
                array('id' => 23,'code' => 'GU' ,'name' => "Gujarati"),
                array('id' => 24,'code' => 'HE' ,'name' => "Hebrew"),
                array('id' => 25,'code' => 'HI' ,'name' => "Hindi"),
                array('id' => 26,'code' => 'HU' ,'name' => "Hungarian"),
                array('id' => 27,'code' => 'IS' ,'name' => "Icelandic"),
                array('id' => 28,'code' => 'ID' ,'name' => "Indonesian"),
                array('id' => 29,'code' => 'GA' ,'name' => "Irish"),
                array('id' => 30,'code' => 'IT' ,'name' => "Italian"),
                array('id' => 31,'code' => 'JA' ,'name' => "Japanese"),
                array('id' => 32,'code' => 'JW' ,'name' => "Javanese"),
                array('id' => 33,'code' => 'KO' ,'name' => "Korean"),
                array('id' => 34,'code' => 'LA' ,'name' => "Latin"),
                array('id' => 35,'code' => 'LV' ,'name' => "Latvian"),
                array('id' => 36,'code' => 'LT' ,'name' => "Lithuanian"),
                array('id' => 37,'code' => 'MK' ,'name' => "Macedonian"),
                array('id' => 38,'code' => 'MS' ,'name' => "Malay"),
                array('id' => 39,'code' => 'ML' ,'name' => "Malayalam"),
                array('id' => 40,'code' => 'MT' ,'name' => "Maltese"),
                array('id' => 41,'code' => 'MI' ,'name' => "Maori"),
                array('id' => 42,'code' => 'MR' ,'name' => "Marathi"),
                array('id' => 43,'code' => 'MN' ,'name' => "Mongolian"),
                array('id' => 44,'code' => 'NE' ,'name' => "Nepali"),
                array('id' => 45,'code' => 'NO' ,'name' => "Norwegian"),
                array('id' => 46,'code' => 'FA' ,'name' => "Persian"),
                array('id' => 47,'code' => 'PL' ,'name' => "Polish"),
                array('id' => 48,'code' => 'PT' ,'name' => "Portuguese"),
                array('id' => 49,'code' => 'PA' ,'name' => "Punjabi"),
                array('id' => 50,'code' => 'QU' ,'name' => "Quechua"),
                array('id' => 51,'code' => 'RO' ,'name' => "Romanian"),
                array('id' => 52,'code' => 'RU' ,'name' => "Russian"),
                array('id' => 53,'code' => 'SM' ,'name' => "Samoan"),
                array('id' => 54,'code' => 'SR' ,'name' => "Serbian	"),
                array('id' => 55,'code' => 'SK' ,'name' => "Slovak"),
                array('id' => 56,'code' => 'SL' ,'name' => "Slovenian"),
                array('id' => 57,'code' => 'ES' ,'name' => "Spanish"),
                array('id' => 58,'code' => 'SW' ,'name' => "Swahili"),
                array('id' => 59,'code' => 'SV' ,'name' => "Swedish"),
                array('id' => 60,'code' => 'TA' ,'name' => "Tamil"),
                array('id' => 61,'code' => 'TT' ,'name' => "Tatar"),
                array('id' => 62,'code' => 'TE' ,'name' => "Telugu"),
                array('id' => 63,'code' => 'TH' ,'name' => "Thai"),
                array('id' => 64,'code' => 'BO' ,'name' => "Tibetan"),
                array('id' => 65,'code' => 'TO' ,'name' => "Tonga"),
                array('id' => 66,'code' => 'TR' ,'name' => "Turkish"),
                array('id' => 67,'code' => 'UK' ,'name' => "Ukrainian"),
                array('id' => 68,'code' => 'UR' ,'name' => "Urdu"),
                array('id' => 69,'code' => 'UZ' ,'name' => "Uzbek"),
                array('id' => 70,'code' => 'VI' ,'name' => "Vietnamese"),
                array('id' => 71,'code' => 'CY' ,'name' => "Welsh"),
                array('id' => 72,'code' => 'XH' ,'name' => "Xhosa")



                );
                \DB::table('languages')->insert($languages);

    }
}
