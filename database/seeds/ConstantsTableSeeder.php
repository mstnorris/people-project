<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use PopStat\Permission;
use PopStat\Role;
use PopStat\User;

class ConstantsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        /*
         * Base User Accounts, Roles, and Permissions seeders
         */

        // Mike's account
        $michael = User::create([
            'name'       => 'Michael Norris',
            'email'      => 'mstnorris@gmail.com',
            'password'   => bcrypt('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $michael->profile()->create([
            'first_name' => 'Michael',
            'middle_name' => 'Stephen',
            'last_name' => 'Norris',
            'date_of_birth' => '1988-08-17 03:30:45',
            'gender' => 'male',
            'eye_colour' => 'blue',
            'blood_type' => 'A+',
            'first_language' => 'en',
            'footed' => 'right',
            'handed' => 'right',
            'fathers_first_name' => 'Stephen',
            'fathers_middle_name' => 'Michael',
            'fathers_last_name' => 'Norris',
            'mothers_first_name' => 'Teresa',
            'mothers_middle_name' => 'Mary',
            'mothers_last_name' => 'Hawke'
        ]);

//        // Sezer's account
//        $sezer = User::create([
//            'name'       => 'Sezer Tunca',
//            'email'      => 'sezertunca@gmail.com',
//            'password'   => bcrypt('password'),
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);
//
//        // Holly's account
//        $holly = User::create([
//            'name'       => 'Holly McNicol',
//            'email'      => 'holly.mcnicol@live.co.uk',
//            'password'   => bcrypt('password'),
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);
//
//        // Super Administrator (User)
//        $superU = User::create([
//            'name'       => 'Super Administrator',
//            'email'      => 'super@getwhiteboard.com',
//            'password'   => bcrypt('password'),
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);
//
//        // Administrator (User)
//        $adminU = User::create([
//            'name'       => 'Administrator',
//            'email'      => 'admin@getwhiteboard.com',
//            'password'   => bcrypt('password'),
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);

        // Super Administrator (Role)
        $superR = Role::create([
            'name'       => 'Super Administrator',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Administrator (Role)
        $adminR = Role::create([
            'name'       => 'Administrator',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

//        // Student (Role)
//        $studentR = Role::create([
//            'name'       => 'Student',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);

        // Super Administrator (Permission)
        $superP = Permission::create([
            'name'       => 'Super Administrator',
            'level'      => '1000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Administrator (Permission)
        $adminP = Permission::create([
            'name'       => 'Administrator',
            'level'      => '500',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

//        // Level 200 (Permission)
//        $p200 = Permission::create([
//            'name'       => 'Level 200',
//            'level'      => '200',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);
//
//        // Level 100 (Permission)
//        $p100 = Permission::create([
//            'name'       => 'Level 100',
//            'level'      => '100',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);
//
//        // Level 50 (Permission)
//        Permission::create([
//            'name'       => 'Level 50',
//            'level'      => '50',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);
//
//        // Level 20 (Permission)
//        Permission::create([
//            'name'       => 'Level 20',
//            'level'      => '20',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);
//
//        // Level 10 (Permission)
//        Permission::create([
//            'name'       => 'Level 10',
//            'level'      => '10',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);
//
//        // Level 5 (Permission)
//        Permission::create([
//            'name'       => 'Level 5',
//            'level'      => '5',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);
//
//        // Level 2 (Permission)
//        Permission::create([
//            'name'       => 'Level 2',
//            'level'      => '2',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);
//
//        // Level 1 (Permission)
//        Permission::create([
//            'name'       => 'Level 1',
//            'level'      => '1',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);
//
//        // Level 0 (Permission)
//        Permission::create([
//            'name'       => 'Level 0',
//            'level'      => '0',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);

        /*
         * Detailed User Accounts with Roles and Permissions
         */

//        $michael->roles()->attach($studentR);
//        $sezer->roles()->attach($studentR);
//        $holly->roles()->attach($studentR);
//
//        $superU->roles()->attach($superR);
//        $adminU->roles()->attach($adminR);

        $superR->permissions()->attach($superP);
        $adminR->permissions()->attach($adminP);

        $michael->roles()->attach($superR);
//        $sezer->roles()->attach($superR);
//        $holly->roles()->attach($studentR);

        foreach ( range ( 1, 1000000) as $index)
        {
            $hasMiddleName = $faker->boolean(30);
            $gender = $faker->randomElement(['male','female']);
            $firstName = $faker->firstName($gender);
            $middleName = $hasMiddleName ? $faker->firstName($gender) : null;
            $lastName = $faker->lastName;
            $dateOfBirth = $faker->dateTimeBetween(Carbon::now()->subYears(70), Carbon::now()->subYears(13));
            $eyeColour = $faker->randomElement(['blue', 'green', 'brown']);
            $bloodType = $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']);
            $firstLanguage = $faker->languageCode;
            $footed = $faker->randomElement(['left', 'right']);
            $handed = $footed;
            $fathers_first_name = $faker->firstName('male');
            $fathers_middle_name = $faker->boolean() ? $faker->firstName('male') : null;
            $fathers_last_name = $faker->lastName;
            $mothers_first_name = $faker->firstName('female');
            $mothers_middle_name = $faker->boolean() ? $faker->firstName('female') : null;
            $mothers_last_name = $faker->lastName;
            $user = User::create([
                'name' => $firstName . ' ' . $lastName,
                'email' => $firstName . $lastName . '@example.com',
                'password' => bcrypt('password')
            ]);

            $user->profile()->create([
                'first_name' => $firstName,
                'middle_name' => $middleName,
                'last_name' => $lastName,
                'date_of_birth' => $dateOfBirth,
                'gender' => $gender,
                'eye_colour' => $eyeColour,
                'blood_type' => $bloodType,
                'first_language' => $firstLanguage,
                'footed' => $footed,
                'handed' => $handed,
                'fathers_first_name' => $fathers_first_name,
                'fathers_middle_name' => $fathers_middle_name,
                'fathers_last_name' => $fathers_last_name,
                'mothers_first_name' => $mothers_first_name,
                'mothers_middle_name' => $mothers_middle_name,
                'mothers_last_name' => $mothers_last_name
            ]);

            echo $user->getName() . "\r\n";
        }

    }
}