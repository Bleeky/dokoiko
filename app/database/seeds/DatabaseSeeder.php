<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();
        $this->call('ArticleTableSeeder');
        $this->call('PictureTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('WebsiteTableSeeder');
        $this->call('VideoTableSeeder');
        $this->command->info('Database seeded.');
    }
}

class PictureTableSeeder extends Seeder {
    public function run()
    {
        DB::table('pictures')->delete();

        Picture::create(array(
            'title' => 'Test 1',
            'html'  =>  "<p style=\"text-align: center;\" class=\"title\"><em><span style=\"font-family: 'Josefin Sans'; font-size: 60px;\">Article Prototype</span></em></p><p><img class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" src=\"http://localhost:8000/ressources/pictures/large/holder.png\" width=\"530\"></p><p class=\"content\"><span style=\"font-family: 'Open Sans'; font-size: 21px;\">This is a example content for your image. Please write your own here !</span></p>",
            'content' =>    "This is a example content for your image. Please write your own here !",
            'image' => 'holder.png',
            'status' => '1',
            'id'    =>  '0',
        ));
        sleep(1);
        Picture::create(array(
            'title' => 'Test 2',
            'html'  =>  "<p style=\"text-align: center;\" class=\"title\"><em><span style=\"font-family: 'Josefin Sans'; font-size: 60px;\">Article Prototype</span></em></p><p><img class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" src=\"http://localhost:8000/ressources/pictures/large/holder.png\" width=\"530\"></p><p class=\"content\"><span style=\"font-family: 'Open Sans'; font-size: 21px;\">This is a example content for your image. Please write your own here !</span></p>",
            'content' =>    "This is a example content for your image. Please write your own here !",
            'image' => 'holder.png',
            'status' => '1',
            'id'    =>  '1',
        ));
        sleep(1);
        Picture::create(array(
            'title' => 'Test 3',
            'html'  =>  "<p style=\"text-align: center;\" class=\"title\"><em><span style=\"font-family: 'Josefin Sans'; font-size: 60px;\">Article Prototype</span></em></p><p><img class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" src=\"http://localhost:8000/ressources/pictures/large/holder.png\" width=\"530\"></p><p class=\"content\"><span style=\"font-family: 'Open Sans'; font-size: 21px;\">This is a example content for your image. Please write your own here !</span></p>",
            'content' =>    "This is a example content for your image. Please write your own here !",
            'image' => 'holder.png',
            'status' => '1',
            'id'    =>  '2',
        ));
        sleep(1);
        Picture::create(array(
            'title' => 'Test 4',
            'html'  =>  "<p style=\"text-align: center;\" class=\"title\"><em><span style=\"font-family: 'Josefin Sans'; font-size: 60px;\">Article Prototype</span></em></p><p><img class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" src=\"http://localhost:8000/ressources/pictures/large/holder.png\" width=\"530\"></p><p class=\"content\"><span style=\"font-family: 'Open Sans'; font-size: 21px;\">This is a example content for your image. Please write your own here !</span></p>",
            'content' =>    "This is a example content for your image. Please write your own here !",
            'image' => 'holder.png',
            'status' => '1',
            'id'    =>  '3',
        ));
        sleep(1);
        Picture::create(array(
            'title' => 'Test 5',
            'html'  =>  "<p style=\"text-align: center;\" class=\"title\"><em><span style=\"font-family: 'Josefin Sans'; font-size: 60px;\">Article Prototype</span></em></p><p><img class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" src=\"http://localhost:8000/ressources/pictures/large/holder.png\" width=\"530\"></p><p class=\"content\"><span style=\"font-family: 'Open Sans'; font-size: 21px;\">This is a example content for your image. Please write your own here !</span></p>",
            'content' =>    "This is a example content for your image. Please write your own here !",
            'image' => 'holder.png',
            'status' => '1',
            'id'    =>  '4',
        ));
        sleep(1);
        Picture::create(array(
            'title' => 'Test 6',
            'html'  =>  "<p style=\"text-align: center;\" class=\"title\"><em><span style=\"font-family: 'Josefin Sans'; font-size: 60px;\">Article Prototype</span></em></p><p><img class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" src=\"http://localhost:8000/ressources/pictures/large/holder.png\" width=\"530\"></p><p class=\"content\"><span style=\"font-family: 'Open Sans'; font-size: 21px;\">This is a example content for your image. Please write your own here !</span></p>",
            'content' =>    "This is a example content for your image. Please write your own here !",
            'image' => 'holder.png',
            'status' => '1',
            'id'    =>  '5',
        ));
        sleep(1);
        Picture::create(array(
            'title' => 'Test 7',
            'html'  =>  "<p style=\"text-align: center;\" class=\"title\"><em><span style=\"font-family: 'Josefin Sans'; font-size: 60px;\">Article Prototype</span></em></p><p><img class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" src=\"http://localhost:8000/ressources/pictures/large/holder.png\" width=\"530\"></p><p class=\"content\"><span style=\"font-family: 'Open Sans'; font-size: 21px;\">This is a example content for your image. Please write your own here !</span></p>",
            'content' =>    "This is a example content for your image. Please write your own here !",
            'image' => 'holder.png',
            'status' => '1',
            'id'    =>  '6',
        ));
        sleep(1);
    }
}

class ArticleTableSeeder extends Seeder {

    public function run() {

        DB::table('articles')->delete();

        Article::create(array(
            'title'         => 'Test 1',
            'content'   =>  "<p class=\"title\" style=\"text-align: center;\"><em><span style=\"font-family: 'Josefin Sans'; font-size: 60px;\">Article Prototype</span></em></p><p><img class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" src=\"http://localhost:8000/ressources/articles/holder.png\" width=\"683\"></p><p class=\"introduction\"><span style=\"font-family: 'Open Sans'; font-size: 20px;\">This is a small article introduction. You should write your own here. Have fun !</span></p>",
            'introduction'  => "This is a small article introduction. You should write your own here. Have fun !",
            'image'         => 'http://localhost:8000/ressources/articles/holder.png',
            'status'         => '1',
            'id'    =>  '0',
        ));
        sleep(1);
        Article::create(array(
            'title'         => 'Test 2',
            'content'   =>  "<p class=\"title\" style=\"text-align: center;\"><em><span style=\"font-family: 'Josefin Sans'; font-size: 60px;\">Article Prototype</span></em></p><p><img class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" src=\"http://localhost:8000/ressources/articles/holder.png\" width=\"683\"></p><p class=\"introduction\"><span style=\"font-family: 'Open Sans'; font-size: 20px;\">This is a small article introduction. You should write your own here. Have fun !</span></p>",
            'introduction'  => "This is a small article introduction. You should write your own here. Have fun !",
            'image'         => 'http://localhost:8000/ressources/articles/holder.png',
            'status'         => '1',
            'id'    =>  '1',
        ));
        sleep(1);
        Article::create(array(
            'title'         => 'Test 3',
            'content'   =>  "<p class=\"title\" style=\"text-align: center;\"><em><span style=\"font-family: 'Josefin Sans'; font-size: 60px;\">Article Prototype</span></em></p><p><img class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" src=\"http://localhost:8000/ressources/articles/holder.png\" width=\"683\"></p><p class=\"introduction\"><span style=\"font-family: 'Open Sans'; font-size: 20px;\">This is a small article introduction. You should write your own here. Have fun !</span></p>",
            'introduction'  => "This is a small article introduction. You should write your own here. Have fun !",
            'image'         => 'http://localhost:8000/ressources/articles/holder.png',
            'status'         => '1',
            'id'    =>  '2',
        ));
        sleep(1);
        Article::create(array(
            'title'         => 'Test 4',
            'content'   =>  "<p class=\"title\" style=\"text-align: center;\"><em><span style=\"font-family: 'Josefin Sans'; font-size: 60px;\">Article Prototype</span></em></p><p><img class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" src=\"http://localhost:8000/ressources/articles/holder.png\" width=\"683\"></p><p class=\"introduction\"><span style=\"font-family: 'Open Sans'; font-size: 20px;\">This is a small article introduction. You should write your own here. Have fun !</span></p>",
            'introduction'  => "This is a small article introduction. You should write your own here. Have fun !",
            'image'         => 'http://localhost:8000/ressources/articles/holder.png',
            'status'         => '1',
            'id'    =>  '3',
        ));
        sleep(1);
        Article::create(array(
            'title'         => 'Test 5',
            'content'   =>  "<p class=\"title\" style=\"text-align: center;\"><em><span style=\"font-family: 'Josefin Sans'; font-size: 60px;\">Article Prototype</span></em></p><p><img class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" src=\"http://localhost:8000/ressources/articles/holder.png\" width=\"683\"></p><p class=\"introduction\"><span style=\"font-family: 'Open Sans'; font-size: 20px;\">This is a small article introduction. You should write your own here. Have fun !</span></p>",
            'introduction'  => "This is a small article introduction. You should write your own here. Have fun !",
            'image'         => 'http://localhost:8000/ressources/articles/holder.png',
            'status'         => '1',
            'id'    =>  '4',
        ));
        sleep(1);
    }
}

class UserTableSeeder extends Seeder {

    public function run() {

        DB::table('users')->delete();

        User::create(array(
            'username'         => 'Bleeky',
            'password'         => Hash::make('test'),
        ));
    }
}
class VideoTableSeeder extends Seeder {

    public function run() {

        DB::table('videos')->delete();

        Video::create(array(
            'title'         => 'Ceci est un super test !',
            'youtubeid'         => 'ZXYo5ojdt_k',
            'status'    =>  '1',
        ));
        sleep(1);
        Video::create(array(
            'title'         => 'Ceci est un super test !',
            'youtubeid'         => 'yzLTZLoJ9hE',
            'status'    =>  '1',
        ));
        sleep(1);
        Video::create(array(
            'title'         => 'Ceci est un super test !',
            'youtubeid'         => 'ItffNZtUYXA',
            'status'    =>  '1',
        ));
        sleep(1);
        Video::create(array(
            'title'         => 'Ceci est un super test !',
            'youtubeid'         => 'cbZ7SWYCBSY',
            'status'    =>  '1',
        ));
    }
}

class WebsiteTableSeeder extends Seeder {

    public function run() {

        DB::table('website')->delete();

        Website::create(array(
            'status'         => '1',
        ));
    }
}