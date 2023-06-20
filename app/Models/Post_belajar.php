<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Wiratama",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure doloremque vero enim est consectetur, vel optio itaque reiciendis dignissimos pariatur maiores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea iusto suscipit ipsum id! Dolor officia quod harum adipisci, ipsa libero."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Ashidiqi",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consectetur enim earum esse error consequatur ullam tempora, modi quae eligendi, dolor, sed a dolores odio impedit aut? Aperiam eius consequuntur vel recusandae veritatis eaque, suscipit cumque in id, sapiente voluptates a!"
        ],
    ];
    public static function allData()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::allData();
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);


    }
}
