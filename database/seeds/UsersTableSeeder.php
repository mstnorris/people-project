<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use PopStat\Profile;
use PopStat\User;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $password = bcrypt('password');
        for ( $batch = 1; $batch <= 400; $batch++ ) {
            unset($users);
            $users = [];
            unset($profiles);
            $profiles = [];
            foreach (range(1, 250) as $index) {
                $hasMiddleName       = $faker->boolean(30);
                $gender              = $faker->randomElement(['male', 'female']);
                $firstName           = $faker->firstName($gender);
                $middleName          = $hasMiddleName ? $faker->firstName($gender) : null;
                $lastName            = $faker->lastName;
                $dateOfBirth         = $faker->dateTimeBetween(Carbon::now()->subYears(70), Carbon::now()->subYears(13));
                $eyeColour           = $faker->randomElement(['blue', 'green', 'brown']);
                $bloodType           = $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']);
                $firstLanguage       = $faker->languageCode;
                $footed              = $faker->randomElement(['left', 'right']);
                $handed              = $footed;
                $fathers_first_name  = $faker->firstName('male');
                $fathers_middle_name = $faker->boolean() ? $faker->firstName('male') : null;
                $fathers_last_name   = $faker->lastName;
                $mothers_first_name  = $faker->firstName('female');
                $mothers_middle_name = $faker->boolean() ? $faker->firstName('female') : null;
                $mothers_last_name   = $faker->lastName;

                $users[] = [
                    'name'     => $firstName . ' ' . $lastName,
                    'email'    => strtolower($firstName . $lastName) . '@' . $faker->domainWord . $faker->randomDigit . $faker->randomElement(['.co.uk', '.com', '.net', '.org']),
                    'password' => $password
                ];

                $profiles[] = [
                    'user_id'             => $index,
                    'first_name'          => $firstName,
                    'middle_name'         => $middleName,
                    'last_name'           => $lastName,
                    'date_of_birth'       => $dateOfBirth,
                    'gender'              => $gender,
                    'eye_colour'          => $eyeColour,
                    'blood_type'          => $bloodType,
                    'first_language'      => $firstLanguage,
                    'footed'              => $footed,
                    'handed'              => $handed,
                    'fathers_first_name'  => $fathers_first_name,
                    'fathers_middle_name' => $fathers_middle_name,
                    'fathers_last_name'   => $fathers_last_name,
                    'mothers_first_name'  => $mothers_first_name,
                    'mothers_middle_name' => $mothers_middle_name,
                    'mothers_last_name'   => $mothers_last_name
                ];

                echo 'Batch ' . $batch . ' User ' . $index . ' - ' . $firstName . ' ' . $lastName . "\r\n";
            }

            try {
                User::insert($users);
                Profile::insert($profiles);
            } catch(PDOException $e) {
                echo $e . "\r\n";
            }
        }
    }

}