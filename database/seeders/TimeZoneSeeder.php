<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TimeZoneSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            \DB::table('timezones')->delete();
            $time = array(
                array('id' => 1,'diff_from_gtm' => 'GMT-12:00' ,'name' =>'GMT-12:00 International Date Line West','value'=>'-12'),
                array('id' => 2,'diff_from_gtm' => 'GMT-11:00' ,'name' => 'GMT-11:00 Midway Island, Samoa','value' =>'-10'),
                array('id' => 3,'diff_from_gtm' => 'GMT-10:00' ,'name' => 'GMT-10:00 Hawaii' ,'value' =>'-10'),
                array('id' => 4,'diff_from_gtm' => 'GMT-09:00' ,'name' => 'GMT-09:00 Alaska' ,'value' =>'-9'),
                array('id' => 5,'diff_from_gtm' => 'GMT-08:00' ,'name' => 'GMT-08:00 Pacific Time (US & Canada)' ,'value' =>'-8'),
                array('id' => 6,'diff_from_gtm' => 'GMT-08:00' ,'name' => 'GMT-08:00 Tijuana, Baja California' ,'value' =>'-8'),
                array('id' => 7,'diff_from_gtm' => 'GMT-07:00' ,'name' => 'GMT-07:00 Arizona' ,'value' =>'-7'),
                array('id' => 8,'diff_from_gtm' => 'GMT-07:00' ,'name' => 'GMT-07:00 Chihuahua, La Paz, Mazatlan' ,'value' =>'-7'),
                array('id' => 9,'diff_from_gtm' => 'GMT-07:00' ,'name' => 'GMT-07:00 Chihuahua, Mountain Time (US & Canada)' ,'value' =>'-7'),
                array('id' => 10,'diff_from_gtm' => 'GMT-06:00' ,'name' => 'GMT-06:00 Central America' ,'value' =>'-6'),
                array('id' => 11,'diff_from_gtm' => 'GMT-06:00' ,'name' => 'GMT-06:00 Central Time (US & Canada)' ,'value' =>'-6'),
                array('id' => 12,'diff_from_gtm' => 'GMT-06:00' ,'name' => 'GMT-06:00 Guadalajara, Mexico City, Monterrey' ,'value' =>'-6'),
                array('id' => 13,'diff_from_gtm' => 'GMT-06:00' ,'name' => 'GMT-06:00 Saskatchewan' ,'value' =>'-6'),
                array('id' => 14,'diff_from_gtm' => 'GMT-05:00' ,'name' => 'GMT-05:00 Bogota, Lima, Quito, Rio Branco' ,'value' =>'-5'),
                array('id' => 15,'diff_from_gtm' => 'GMT-05:00' ,'name' => 'GMT-05:00 Bogota, Eastern Time (US & Canada)' ,'value' =>'-5'),
                array('id' => 16,'diff_from_gtm' => 'GMT-05:00' ,'name' => 'GMT-05:00 Indiana (East)','value' =>'-5'),
                array('id' => 17,'diff_from_gtm' => 'GMT-04:00' ,'name' => 'GMT-04:00 Atlantic Time (Canada)' ,'value' =>'-4'),
                array('id' => 18,'diff_from_gtm' => 'GMT-04:00' ,'name' => 'GMT-04:00 Caracas, La Paz','value' =>'-4'),
                array('id' => 19,'diff_from_gtm' => 'GMT-04:00' ,'name' => 'GMT-04:00 Manaus', 'value' =>'-4'),
                array('id' => 20,'diff_from_gtm' => 'GMT-04:00' ,'name' => 'GMT-04:00 Santiago', 'value' =>'-4'),
                array('id' => 21,'diff_from_gtm' => 'GMT-03:30' ,'name' => 'GMT-03:30 Newfoundland', 'value' =>'-3.5'),
                array('id' => 22,'diff_from_gtm' => 'GMT-03:00' ,'name' => 'GMT-03:00 Brasilia', 'value' =>'-3'),
                array('id' => 23,'diff_from_gtm' => 'GMT-03:00' ,'name' => 'GMT-03:00 Buenos Aires, Georgetown', 'value' =>'-3'),
                array('id' => 24,'diff_from_gtm' => 'GMT-03:00' ,'name' => 'GMT-03:00  Greenland', 'value' =>'-3'),
                array('id' => 25,'diff_from_gtm' => 'GMT-03:00' ,'name' => 'GMT-03:00  Montevideo', 'value' =>'-3'),
                array('id' => 26,'diff_from_gtm' => 'GMT-02:00' ,'name' => 'GMT-02:00  Mid-Atlantic', 'value' =>'-2'),
                array('id' => 27,'diff_from_gtm' => 'GMT-01:00' ,'name' => 'GMT-01:00  Cape Verde Is' , 'value' =>'-1'),
                array('id' => 28,'diff_from_gtm' => 'GMT-01:00' ,'name' => 'GMT-01:00  Azores' , 'value' =>'-1'),
                array('id' => 29,'diff_from_gtm' => 'GMT+00:00' ,'name' => 'GMT+00:00  Casablanca, Monrovia, Reykjavik' , 'value' =>'0'),
                array('id' => 30,'diff_from_gtm' => 'GMT+00:00' ,'name' => 'GMT+00:00  Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London' , 'value' =>'0'),
                array('id' => 31,'diff_from_gtm' => 'GMT+01:00' ,'name' => 'GMT+01:00  Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna' , 'value' =>1),
                array('id' => 32,'diff_from_gtm' => 'GMT+01:00' ,'name' => 'GMT+01:00  Belgrade, Bratislava, Budapest, Ljubljana, Prague', 'value' =>1),
                array('id' => 33,'diff_from_gtm' => 'GMT+01:00' ,'name' => 'GMT+01:00  Brussels, Copenhagen, Madrid, Paris ', 'value' =>'1'),
                array('id' => 34,'diff_from_gtm' => 'GMT+01:00' ,'name' => 'GMT+01:00 Sarajevo, Skopje, Warsaw, Zagreb', 'value' =>'1'),
                array('id' => 35,'diff_from_gtm' => 'GMT+01:00' ,'name' => 'GMT+01:00  West Central Africa', 'value' =>'1'),
                array('id' => 36,'diff_from_gtm' => 'GMT+02:00' ,'name' => 'GMT+02:00  Amman', 'value' =>'2'),
                array('id' => 37,'diff_from_gtm' => 'GMT+02:00' ,'name' => 'GMT+02:00 Athens, Bucharest, Istanbul', 'value' =>'2'),
                array('id' => 38,'diff_from_gtm' => 'GMT+02:00' ,'name' => 'GMT+02:00  Beirut', 'value' =>'2'),
                array('id' => 39,'diff_from_gtm' => 'GMT+02:00' ,'name' => 'GMT+02:00  Cairo', 'value' =>'2'),
                array('id' => 40,'diff_from_gtm' => 'GMT+02:00' ,'name' => 'GMT+02:00  Harare, Pretoria', 'value' =>'2'),
                array('id' => 41,'diff_from_gtm' => 'GMT+02:00' ,'name' => 'GMT+02:00 Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius', 'value' =>'2'),
                array('id' => 42,'diff_from_gtm' => 'GMT+02:00' ,'name' => 'GMT+02:00  Jerusalem', 'value' =>'2'),
                array('id' => 43,'diff_from_gtm' => 'GMT+02:00' ,'name' => 'GMT+02:00  Minsk', 'value' =>'2'),
                array('id' => 44,'diff_from_gtm' => 'GMT+02:00' ,'name' => 'GMT+02:00  Windhoek', 'value' =>'2'),
                array('id' => 45,'diff_from_gtm' => 'GMT+03:00' ,'name' => 'GMT+03:00  Kuwait, Riyadh, Baghdad', 'value' =>'3'),
                array('id' => 46,'diff_from_gtm' => 'GMT+03:00' ,'name' => 'GMT+03:00  Moscow, St. Petersburg, Volgograd', 'value' =>'3'),
                array('id' => 47,'diff_from_gtm' => 'GMT+03:00' ,'name' => 'GMT+03:00  Nairobi', 'value' =>'3'),
                array('id' => 48,'diff_from_gtm' => 'GMT+03:00' ,'name' => 'GMT+03:00  Tbilisi', 'value' =>'3'),
                array('id' => 49,'diff_from_gtm' => 'GMT+03:30' ,'name' => 'GMT+03:30  Tehran', 'value' =>'3.5'),
                array('id' => 50,'diff_from_gtm' => 'GMT+04:00' ,'name' => 'GMT+04:00  Abu Dhabi, Muscat', 'value' =>'4'),
                array('id' => 51,'diff_from_gtm' => 'GMT+04:00' ,'name' => 'GMT+04:00  Baku', 'value' =>'4'),
                array('id' => 52,'diff_from_gtm' => 'GMT+04:00' ,'name' => 'GMT+04:00  Yerevan', 'value' =>'4'),
                array('id' => 53,'diff_from_gtm' => 'GMT+04:30' ,'name' => 'GMT+04:30  Kabul', 'value' =>'4.5'),
                array('id' => 54,'diff_from_gtm' => 'GMT+05:00' ,'name' => 'GMT+05:00  Yekaterinburg', 'value' =>'5'),
                array('id' => 55,'diff_from_gtm' => 'GMT+05:00' ,'name' => 'GMT+05:00  Islamabad, Karachi, Tashkent', 'value' =>'5'),
                array('id' => 56,'diff_from_gtm' => 'GMT+05:30' ,'name' => 'GMT+05:30  Sri Jayawardenapura', 'value' =>'5.5'),
                array('id' => 57,'diff_from_gtm' => 'GMT+05:30' ,'name' => 'GMT+05:30  Chennai, Kolkata, Mumbai, New Delhi', 'value' =>'5.5'),
                array('id' => 58,'diff_from_gtm' => 'GMT+05:45' ,'name' => 'GMT+05:45 Kathmandu', 'value' =>'5.75'),
                array('id' => 59,'diff_from_gtm' => 'GMT+06:00' ,'name' => 'GMT+06:00 Almaty, Novosibirsk', 'value' =>'6'),
                array('id' => 60,'diff_from_gtm' => 'GMT+06:00' ,'name' => 'GMT+06:00 Astana, Dhaka', 'value' =>'6'),
                array('id' => 61,'diff_from_gtm' => 'GMT+06:30' ,'name' => 'GMT+06:30 Yangon (Rangoon)', 'value' =>'6.5'),
                array('id' => 62,'diff_from_gtm' => 'GMT+07:00' ,'name' => 'GMT+07:00  Bangkok, Hanoi, Jakarta', 'value' =>'7'),
                array('id' => 63,'diff_from_gtm' => 'GMT+07:00' ,'name' => 'GMT+07:00 Krasnoyarsk', 'value' =>'7'),
                array('id' => 64,'diff_from_gtm' => 'GMT+08:00' ,'name' => 'GMT+08:00 Beijing, Chongqing, Hong Kong, Urumqi', 'value' =>'8'),
                array('id' => 65,'diff_from_gtm' => 'GMT+08:00' ,'name' => 'GMT+08:00 Kuala Lumpur, Singapore', 'value' =>'8'),
                array('id' => 66,'diff_from_gtm' => 'GMT+08:00' ,'name' => 'GMT+08:00 Irkutsk, Ulaan Bataar', 'value' =>'8'),
                array('id' => 67,'diff_from_gtm' => 'GMT+08:00' ,'name' => 'GMT+08:00 Perth', 'value' =>'8'),
                array('id' => 68,'diff_from_gtm' => 'GMT+08:00' ,'name' => 'GMT+08:00 Taipei', 'value' =>'8'),
                array('id' => 69,'diff_from_gtm' => 'GMT+09:00' ,'name' => 'GMT+09:00 Osaka, Sapporo, Tokyo', 'value' =>'9'),
                array('id' => 70,'diff_from_gtm' => 'GMT+09:00' ,'name' => 'GMT+09:00 Seoul', 'value' =>'9'),
                array('id' => 71,'diff_from_gtm' => 'GMT+09:00' ,'name' => 'GMT+09:00 Yakutsk', 'value' =>'9'),
                array('id' => 72,'diff_from_gtm' => 'GMT+09:30' ,'name' => 'GMT+09:30 Adelaide', 'value' =>'9.5'),
                array('id' => 73,'diff_from_gtm' => 'GMT+09:30' ,'name' => 'GMT+09:30 Darwin', 'value' =>'9.5'),
                array('id' => 74,'diff_from_gtm' => 'GMT+10:00' ,'name' => 'GMT+10:00 Brisbane', 'value' =>'10'),
                array('id' => 75,'diff_from_gtm' => 'GMT+10:00' ,'name' => 'GMT+10:00 Canberra, Melbourne, Sydney', 'value' =>'10'),
                array('id' => 76,'diff_from_gtm' => 'GMT+10:00' ,'name' => 'GMT+10:00 Hobart', 'value' =>'10'),
                array('id' => 77,'diff_from_gtm' =>'GMT+10:00' ,'name' => 'GMT+10:00 Guam, Port Moresby', 'value' =>'10'),
                array('id' => 78,'diff_from_gtm' => 'GMT+10:00' ,'name' => 'GMT+10:00 Vladivostok', 'value' =>'10'),
                array('id' => 79,'diff_from_gtm' => 'GMT+11:00' ,'name' => 'GMT+11:00  Magadan, Solomon Is., New Caledonia', 'value' =>'11'),
                array('id' => 80,'diff_from_gtm' => 'GMT+12:00' ,'name' => 'GMT+12:00  Auckland, Wellington', 'value' =>'12'),
                array('id' => 81,'diff_from_gtm' => 'GMT+12:00' ,'name' => 'GMT+12:00  Fiji, Kamchatka, Marshall Is', 'value' =>'12'),
                array('id' => 82,'diff_from_gtm' => 'GMT+13:00' ,'name' => 'GMT+13:00  Nuku alofa', 'value' =>'13')


                );
                \DB::table('timezones')->insert($time);

    }
}

