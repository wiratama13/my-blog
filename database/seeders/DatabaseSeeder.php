<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::create([
        //     'name' => 'wiratama',
        //     'email' => 'wira@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'ashidiqi',
        //     'email' => 'ashidiqi@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        \App\Models\User::factory(5)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);

        Category::create([
            'name' => 'Gaming',
            'slug' => 'gaming',
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        User::create([
            'name' => 'Wiratama Ashidiqi',
            'username' => 'wiratama',
            'email' => 'wira@gmail.com',
            'password' => bcrypt('password')
        ]);

        Post::factory(20
        )->create();
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nam fugiat molestias minus, officia unde quae sint natus fugit corporis quod, aperiam dolorum, sequi cum perferendis aliquam.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nam fugiat molestias minus, officia unde quae sint natus fugit corporis quod, aperiam dolorum, sequi cum perferendis aliquam. Exercitationem, hic debitis, omnis ut, eveniet vitae sed corporis veritatis voluptatibus dignissimos fugit molestiae aspernatur nulla reprehenderit.</p>'
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'category_id' => 1,
        //     'user_id' => 2,
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nam fugiat molestias minus, officia unde quae sint natus fugit corporis quod, aperiam dolorum, sequi cum perferendis aliquam.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nam fugiat molestias minus, officia unde quae sint natus fugit corporis quod, aperiam dolorum, sequi cum perferendis aliquam. Exercitationem, hic debitis, omnis ut, eveniet vitae sed corporis veritatis voluptatibus dignissimos fugit molestiae aspernatur nulla reprehenderit.</p>'
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nam fugiat molestias minus, officia unde quae sint natus fugit corporis quod, aperiam dolorum, sequi cum perferendis aliquam.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nam fugiat molestias minus, officia unde quae sint natus fugit corporis quod, aperiam dolorum, sequi cum perferendis aliquam. Exercitationem, hic debitis, omnis ut, eveniet vitae sed corporis veritatis voluptatibus dignissimos fugit molestiae aspernatur nulla reprehenderit.</p>'
        // ]);



    }
}
