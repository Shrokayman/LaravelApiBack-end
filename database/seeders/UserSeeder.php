<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
            'fname' => 'Mahmoud',
            'lname' => 'Mohamed',
            'email' => 'mahmoud.muhamed94@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'cairo',
            'street' => 'khattab',
            'phone' => 123456789,
            'role' => 'admin',

        ],
        [
            'fname' => 'Mohamed',
            'lname' => 'Saad',
            'email' => 'mohamedsaad17878@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'alex',
            'street' => 'waleed',
            'phone' => 123456789,
            'role' => 'admin',
        ],
        [
            'fname' => 'Mahmoud',
            'lname' => 'Lebda',
            'email' => 'mahmodsaadlebda@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'tanta',
            'street' => 'ezz',
            'phone' => 123456789,
            'role' => 'admin',
        ],
        [
            'fname' => 'Basma',
            'lname' => 'Farok',
            'email' => 'basmafarouk05@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'alex',
            'street' => 'asfra',
            'phone' => 123456789,
            'role' => 'admin',
        ],
        [
            'fname' => 'Shrok',
            'lname' => 'Ayman',
            'email' => 'shrokayman99@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'cairo',
            'street' => 'manil',
            'phone' => 123456789,
            'role' => 'admin',
        ],
        [
            'fname' => 'Jim',
            'lname' => 'Carry',
            'email' => 'jim@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'new york',
            'street' => 'khattab',
            'phone' => 123456789,
            'role' => 'user',
        ],
        [
            'fname' => 'Will',
            'lname' => 'Smith',
            'email' => 'Will@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'florida',
            'street' => 'khattab',
            'phone' => 123456789,
            'role' => 'user',
        ],
        [
            'fname' => 'Jason',
            'lname' => 'Statham',
            'email' => 'jason@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'london',
            'street' => 'khattab',
            'phone' => 123456789,
            'role' => 'user',
        ],
        [
            'fname' => 'Dawyn',
            'lname' => 'Jhonson',
            'email' => 'dawyn@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'boston',
            'street' => 'khattab',
            'phone' => 123456789,
            'role' => 'user',
        ],
        [
            'fname' => 'Tom',
            'lname' => 'Cruse',
            'email' => 'tom@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            'phone' => 123456789,
            'role' => 'user',
        ],
        ];

        DB::table('users')->insert($users);
    }
}
