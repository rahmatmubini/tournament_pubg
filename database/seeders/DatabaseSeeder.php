<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Tournament;
use App\Models\User;
use App\Models\Game;
use App\Models\Point;
use App\Models\Result;
use App\Models\Schedule;
use App\Models\Team;
use App\Models\Standing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Rahmat',
            'username' => 'rahmat',
            'email' => 'rahmat12.tugas@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::factory(20)->create();

        Game::create([
            'name' => 'PUBG Mobile',
            'slug' => 'pubg-mobile',
            'image' => 'pubgmobile.png'
        ]);

        Game::create([
            'name' => 'Mobile Legends',
            'slug' => 'mobile-legends',
            'image' => 'mobilelegends.png'
        ]);

        Game::create([
            'name' => 'Valorant',
            'slug' => 'valorant',
            'image' => 'valorant.png'
        ]);

        Game::create([
            'name' => 'FreeFire',
            'slug' => 'freefire',
            'image' => 'freefire.png'
        ]);

        Game::create([
            'name' => 'Dota 2',
            'slug' => 'dota-2',
            'image' => 'dota2.png'
        ]);

        Game::create([
            'name' => 'Rocket League',
            'slug' => 'rocket-league',
            'image' => 'rocketleague.png'
        ]);

        Point::create([
            'tournament_id' => 1,
            'kill' => 1
        ]);

        \App\Models\Hastag::factory(16)->create();

        Team::factory(1)->create();

        Tournament::create([
            'title' => 'Judul Pertama',
            'slug' => 'judul-pertama',
            'prize' => 'Rp. 1.000.000',
            'time' => '20:00',
            'registrationDate' => Carbon::parse('2022-08-10'),
            'matchDate' => Carbon::parse('2022-08-15'),
            'matchAndDate' => Carbon::parse('2022-08-20'),
            'location' => 'Online',
            'body' => 'Pertama Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quis pariatur voluptates, magni harum natus alias unde. Accusamus doloribus ducimus neque, minima dolorem nam vel non, doloremque nesciunt vitae laudantium dolor magni nisi quia. Suscipit dolor laudantium ab enim quasi numquam at magni omnis eligendi. Deserunt possimus dolorum vero incidunt voluptas minima, quos porro odio debitis nobis itaque soluta delectus!',
            'game_id' => 1,
            'slot' => 16,
            'user_id' => 1

        ]);

        // Tournament::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'prize' => 'Rp. 2.000.000',
        //     'time' => '20:00',
        //     'registrationDate' => Carbon::parse('2022-03-30'),
        //     'matchDate' => Carbon::parse('2022-03-30'),
        //     'matchAndDate' => Carbon::parse('2022-03-30'),
        //     'location' => 'Online',
        //     'body' => 'Kedua Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quis pariatur voluptates, magni harum natus alias unde. Accusamus doloribus ducimus neque, minima dolorem nam vel non, doloremque nesciunt vitae laudantium dolor magni nisi quia. Suscipit dolor laudantium ab enim quasi numquam at magni omnis eligendi. Deserunt possimus dolorum vero incidunt voluptas minima, quos porro odio debitis nobis itaque soluta delectus!',
        //     'game_id' => 2,
        //     'slot' => 16,
        //     'user_id' => 2

        // ]);

        // Tournament::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'prize' => 'Rp. 3.000.000',
        //     'time' => '20:00',
        //     'registrationDate' => Carbon::parse('2022-03-30'),
        //     'matchDate' => Carbon::parse('2022-03-30'),
        //     'matchAndDate' => Carbon::parse('2022-03-30'),
        //     'location' => 'Online',
        //     'body' => 'Ketiga Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quis pariatur voluptates, magni harum natus alias unde. Accusamus doloribus ducimus neque, minima dolorem nam vel non, doloremque nesciunt vitae laudantium dolor magni nisi quia. Suscipit dolor laudantium ab enim quasi numquam at magni omnis eligendi. Deserunt possimus dolorum vero incidunt voluptas minima, quos porro odio debitis nobis itaque soluta delectus!',
        //     'game_id' => 1,
        //     'slot' => 16,
        //     'user_id' => 3

        // ]);

        // Tournament::create([
        //     'title' => 'Judul Empat',
        //     'slug' => 'judul-empat',
        //     'prize' => 'Rp. 4.000.000',
        //     'time' => '20:00',
        //     'registrationDate' => Carbon::parse('2022-03-30'),
        //     'matchDate' => Carbon::parse('2022-03-30'),
        //     'matchAndDate' => Carbon::parse('2022-03-30'),
        //     'location' => 'Online',
        //     'body' => 'Keempat Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quis pariatur voluptates, magni harum natus alias unde. Accusamus doloribus ducimus neque, minima dolorem nam vel non, doloremque nesciunt vitae laudantium dolor magni nisi quia. Suscipit dolor laudantium ab enim quasi numquam at magni omnis eligendi. Deserunt possimus dolorum vero incidunt voluptas minima, quos porro odio debitis nobis itaque soluta delectus!',
        //     'game_id' => 2,
        //     'slot' => 16,
        //     'user_id' => 4

        // ]);

        // Tournament::create([
        //     'title' => 'Judul Lima',
        //     'slug' => 'judul-lima',
        //     'prize' => 'Rp. 5.000.000',
        //     'time' => '20:00',
        //     'registrationDate' => Carbon::parse('2022-03-30'),
        //     'matchDate' => Carbon::parse('2022-03-30'),
        //     'matchAndDate' => Carbon::parse('2022-03-30'),
        //     'location' => 'Online',
        //     'body' => 'Kelima Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quis pariatur voluptates, magni harum natus alias unde. Accusamus doloribus ducimus neque, minima dolorem nam vel non, doloremque nesciunt vitae laudantium dolor magni nisi quia. Suscipit dolor laudantium ab enim quasi numquam at magni omnis eligendi. Deserunt possimus dolorum vero incidunt voluptas minima, quos porro odio debitis nobis itaque soluta delectus!',
        //     'game_id' => 1,
        //     'slot' => 16,
        //     'user_id' => 2

        // ]);

        // Tournament::create([
        //     'title' => 'Judul Enam',
        //     'slug' => 'judul-enam',
        //     'prize' => 'Rp. 6.000.000',
        //     'time' => '20:00',
        //     'registrationDate' => Carbon::parse('2022-03-30'),
        //     'matchDate' => Carbon::parse('2022-03-30'),
        //     'matchAndDate' => Carbon::parse('2022-03-30'),
        //     'location' => 'Online',
        //     'body' => 'Keenam Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quis pariatur voluptates, magni harum natus alias unde. Accusamus doloribus ducimus neque, minima dolorem nam vel non, doloremque nesciunt vitae laudantium dolor magni nisi quia. Suscipit dolor laudantium ab enim quasi numquam at magni omnis eligendi. Deserunt possimus dolorum vero incidunt voluptas minima, quos porro odio debitis nobis itaque soluta delectus!',
        //     'game_id' => 2,
        //     'slot' => 16,
        //     'user_id' => 3

        // ]);

        // Tournament::create([
        //     'title' => 'Judul Tujuh',
        //     'slug' => 'judul-tujuh',
        //     'prize' => 'Rp. 7.000.000',
        //     'time' => '20:00',
        //     'registrationDate' => Carbon::parse('2022-03-30'),
        //     'matchDate' => Carbon::parse('2022-03-30'),
        //     'matchAndDate' => Carbon::parse('2022-03-30'),
        //     'location' => 'Online',
        //     'body' => 'Ketujuh Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quis pariatur voluptates, magni harum natus alias unde. Accusamus doloribus ducimus neque, minima dolorem nam vel non, doloremque nesciunt vitae laudantium dolor magni nisi quia. Suscipit dolor laudantium ab enim quasi numquam at magni omnis eligendi. Deserunt possimus dolorum vero incidunt voluptas minima, quos porro odio debitis nobis itaque soluta delectus!',
        //     'game_id' => 1,
        //     'slot' => 16,
        //     'user_id' => 4

        // ]);

        // Tournament::create([
        //     'title' => 'Judul Delapam',
        //     'slug' => 'judul-delapan',
        //     'prize' => 'Rp. 8.000.000',
        //     'time' => '20:00',
        //     'registrationDate' => Carbon::parse('2022-03-30'),
        //     'matchDate' => Carbon::parse('2022-03-30'),
        //     'matchAndDate' => Carbon::parse('2022-03-30'),
        //     'location' => 'Online',
        //     'body' => 'Kedelapan Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quis pariatur voluptates, magni harum natus alias unde. Accusamus doloribus ducimus neque, minima dolorem nam vel non, doloremque nesciunt vitae laudantium dolor magni nisi quia. Suscipit dolor laudantium ab enim quasi numquam at magni omnis eligendi. Deserunt possimus dolorum vero incidunt voluptas minima, quos porro odio debitis nobis itaque soluta delectus!',
        //     'game_id' => 2,
        //     'slot' => 16,
        //     'user_id' => 2

        // ]);

        // Tournament::create([
        //     'title' => 'Judul Sembilan',
        //     'slug' => 'judul-sembilan',
        //     'prize' => 'Rp. 9.000.000',
        //     'time' => '20:00',
        //     'registrationDate' => Carbon::parse('2022-03-30'),
        //     'matchDate' => Carbon::parse('2022-03-30'),
        //     'matchAndDate' => Carbon::parse('2022-03-30'),
        //     'location' => 'Online',
        //     'body' => 'Kesembilan Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quis pariatur voluptates, magni harum natus alias unde. Accusamus doloribus ducimus neque, minima dolorem nam vel non, doloremque nesciunt vitae laudantium dolor magni nisi quia. Suscipit dolor laudantium ab enim quasi numquam at magni omnis eligendi. Deserunt possimus dolorum vero incidunt voluptas minima, quos porro odio debitis nobis itaque soluta delectus!',
        //     'game_id' => 1,
        //     'slot' => 16,
        //     'user_id' => 3

        // ]);

        // Tournament::create([
        //     'title' => 'Judul Sepuluh',
        //     'slug' => 'judul-sepuluh',
        //     'prize' => 'Rp. 10.000.000',
        //     'time' => '20:00',
        //     'registrationDate' => Carbon::parse('2022-03-30'),
        //     'matchDate' => Carbon::parse('2022-03-30'),
        //     'matchAndDate' => Carbon::parse('2022-03-30'),
        //     'location' => 'Online',
        //     'body' => 'Kesepuluh Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quis pariatur voluptates, magni harum natus alias unde. Accusamus doloribus ducimus neque, minima dolorem nam vel non, doloremque nesciunt vitae laudantium dolor magni nisi quia. Suscipit dolor laudantium ab enim quasi numquam at magni omnis eligendi. Deserunt possimus dolorum vero incidunt voluptas minima, quos porro odio debitis nobis itaque soluta delectus!',
        //     'game_id' => 2,
        //     'slot' => 16,
        //     'user_id' => 4

        // ]);

        Schedule::create([
            'day' => '1',
            'slug' => 'day-1',
            'date' => Carbon::parse('2022-04-28'),
            'tournament_id' => 1,

            'match' => '1',
            'time' => '19:00',
            'map' => 'ERANGEL'
        ]);

        Schedule::create([
            'day' => '1',
            'slug' => 'day-1-2',
            'date' => Carbon::parse('2022-04-28'),
            'tournament_id' => 1,

            'match' => '2',
            'time' => '20:00',
            'map' => 'MIRAMAR'
        ]);

        // Standing::create([
        //     'team_id' => 6,
        //     'tournament_id' => 1,
        //     'slug' => 'bbb',
        //     'chicken' => 3,
        //     'rank_point' => 55,
        //     'kill_point' => 27,
        //     'aggregate' => 82
        // ]);

        // Standing::create([
        //     'team_id' => 8,
        //     'tournament_id' => 1,
        //     'slug' => 'aaa',
        //     'chicken' => 3,
        //     'rank_point' => 45,
        //     'kill_point' => 35,
        //     'aggregate' => 80
        // ]);

        // Standing::create([
        //     'team_id' => 7,
        //     'tournament_id' => 2,
        //     'slug' => 'aaaa',
        //     'matchWL' => '6-1',
        //     'win_rate' => '66.67',
        //     'aggregate' => 14
        // ]);

        // Standing::create([
        //     'team_id' => 10,
        //     'tournament_id' => 6,
        //     'slug' => 'aaab',
        //     'matchWL' => '4-2',
        //     'win_rate' => '66.67',
        //     'aggregate' => 13
        // ]);

        // Result::create([
        //     'team_id' => 1,
        //     'schedule_id' => 1,
        //     'rank' => 1,
        //     'kill' => 5
        // ]);
    }
}
