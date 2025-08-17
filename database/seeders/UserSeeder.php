<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'ismail_admin@gmail.com'],
            [
                'firstName' => 'ismail',
                'lastName' => 'mohd',
                'userName' => 'ismailmohd',
                'password' => Hash::make('000000000'),
                'avatar' => '',
            ]
        );

        if (!$admin->hasRole('admin')) {
            $admin->addRole('admin');
        }

        // Regular users
        $usersData = [
            [
                'firstName' => 'tareq',
                'lastName' => '',
                'userName' => 'tareq',
                'email' => 'tareq@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'osama',
                'lastName' => '',
                'userName' => 'osama',
                'email' => 'osama@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'baha',
                'lastName' => '',
                'userName' => 'baha',
                'email' => 'baha@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'ismail',
                'lastName' => 'real gmail',
                'userName' => 'ismailrealgmail',
                'email' => 'ismail.malakhras@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'nader',
                'lastName' => 'Al-Khatib',
                'userName' => 'naderalkhatib',
                'email' => 'nader.khatib123@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'Layla',
                'lastName' => 'Mansour',
                'userName' => 'laylamansour',
                'email' => 'layla.mansour987@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'Omar',
                'lastName' => 'Saeed',
                'userName' => 'omarsaeed',
                'email' => 'omar.saeed456@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'Noura',
                'lastName' => 'Al-Hassan',
                'userName' => 'noura-alhassan',
                'email' => 'noura.alhassan321@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'Khaled',
                'lastName' => 'Ibrahim',
                'userName' => 'khaledibrahim',
                'email' => 'khaled.ibrahim654@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'Sara',
                'lastName' => 'Jamal',
                'userName' => 'sarajamal',
                'email' => 'sara.jamal852@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'Yousef',
                'lastName' => 'Al-Najjar',
                'userName' => 'yousefalnajjar',
                'email' => 'yousef.najjar741@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'Mona',
                'lastName' => 'Saleh',
                'userName' => 'monasaleh',
                'email' => 'mona.saleh963@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'Tariq',
                'lastName' => 'Abbas',
                'userName' => 'tariqabbas',
                'email' => 'tariq.abbas159@gmail.com',
                'password' => Hash::make('0'),
            ],
            [
                'firstName' => 'Dina',
                'lastName' => 'Farah',
                'userName' => 'dinafarah',
                'email' => 'dina.farah753@gmail.com',
                'password' => Hash::make('0'),
            ],
             [
                'firstName' => 'Dina',
                'lastName' => 'Farah',
                'userName' => 'dinaafarah',
                'email' => 'dina.fassrah753@gmail.com',
                'password' => Hash::make('0'),
            ],
        ];

        foreach ($usersData as &$userData) {
            $userData['avatar'] = '';
        }

        foreach ($usersData as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                $userData
            );

            if (!$user->hasRole('user')) {
                $user->addRole('user');
            }
        }
    }
}
