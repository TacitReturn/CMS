<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = \App\User::create([
            "name" => "John Smith",
            "email" => "JohnSmith@example.com",
            "password" => \Illuminate\Support\Facades\Hash::make("password")
        ]);
        $author2 = \App\User::create([
            "name" => "Jane Applegate",
            "email" => "JaneApplegate@mywebsite.com",
            "password" => \Illuminate\Support\Facades\Hash::make("password")
        ]);

        $category1 = Category::create([
            "name" => "News"
        ]);

        $category2 = Category::create([
            "name" => "Marketing"
        ]);
        $category3 = Category::create([
            "name" => "Partnership"
        ]);
        $category4 = Category::create([
            "name" => "Design"
        ]);
        $category5 = Category::create([
            "name" => "Hiring"
        ]);


        $post1 = $author1->posts()->create([
            "title" => "We relocated our office to a new designed garage",
            "description" => "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...",
            "content" =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sollicitudin gravida suscipit. Vivamus sem felis, consectetur
            ac odio nec, egestas aliquam odio. Duis mollis metus quis blandit viverra. Aenean feugiat eleifend gravida. In tortor nulla, mollis sed augue
            sed, semper mollis felis. Morbi sit amet gravida dui. Nullam vulputate tempus lorem. Suspendisse vitae urna in neque scelerisque
            rhoncus porttitor quis mauris. Integer molestie non elit auctor lacinia. Curabitur eleifend finibus iaculis. Sed vel porta arcu.",
            "category_id" => $category1->id,
            "image" => "posts/1.jpg",
            "user_id" => $author1->id

        ]);

        $post2 = $author2->posts()->create([
            "title" => "Top 5 brilliant content marketing strategies",
            "description" => "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...",
            "content" =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sollicitudin gravida suscipit. Vivamus sem felis, consectetur
            ac odio nec, egestas aliquam odio. Duis mollis metus quis blandit viverra. Aenean feugiat eleifend gravida. In tortor nulla, mollis sed augue
            sed, semper mollis felis. Morbi sit amet gravida dui. Nullam vulputate tempus lorem. Suspendisse vitae urna in neque scelerisque
            rhoncus porttitor quis mauris. Integer molestie non elit auctor lacinia. Curabitur eleifend finibus iaculis. Sed vel porta arcu.",
            "category_id" => $category2->id,
            "image" => "posts/2.jpg"

        ]);

        $post3 = $author1->posts()->create([
            "title" => "Best practices for minimalist design with example",
            "description" => "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...",
            "content" =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sollicitudin gravida suscipit. Vivamus sem felis, consectetur
            ac odio nec, egestas aliquam odio. Duis mollis metus quis blandit viverra. Aenean feugiat eleifend gravida. In tortor nulla, mollis sed augue
            sed, semper mollis felis. Morbi sit amet gravida dui. Nullam vulputate tempus lorem. Suspendisse vitae urna in neque scelerisque
            rhoncus porttitor quis mauris. Integer molestie non elit auctor lacinia. Curabitur eleifend finibus iaculis. Sed vel porta arcu.",
            "category_id" => $category3->id,
            "image" => "posts/3.jpg"

        ]);

        $post4 = $author1->posts()->create([
            "title" => "Congratulate and thank to Maryam for joining our team",
            "description" => "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...",
            "content" =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sollicitudin gravida suscipit. Vivamus sem felis, consectetur
            ac odio nec, egestas aliquam odio. Duis mollis metus quis blandit viverra. Aenean feugiat eleifend gravida. In tortor nulla, mollis sed augue
            sed, semper mollis felis. Morbi sit amet gravida dui. Nullam vulputate tempus lorem. Suspendisse vitae urna in neque scelerisque
            rhoncus porttitor quis mauris. Integer molestie non elit auctor lacinia. Curabitur eleifend finibus iaculis. Sed vel porta arcu.",
            "category_id" => $category4->id,
            "image" => "posts/4.jpg"

        ]);

        $post5 = $author2->posts()->create([
            "title" => "Congratulate and thank to Maryam for joining our team",
            "description" => "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...",
            "content" =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sollicitudin gravida suscipit. Vivamus sem felis, consectetur
            ac odio nec, egestas aliquam odio. Duis mollis metus quis blandit viverra. Aenean feugiat eleifend gravida. In tortor nulla, mollis sed augue
            sed, semper mollis felis. Morbi sit amet gravida dui. Nullam vulputate tempus lorem. Suspendisse vitae urna in neque scelerisque
            rhoncus porttitor quis mauris. Integer molestie non elit auctor lacinia. Curabitur eleifend finibus iaculis. Sed vel porta arcu.",
            "category_id" => $category5->id,
            "image" => "posts/5.jpg"

        ]);

        $tag1 = Tag::create([
            "name" => "job"
        ]);
        $tag2 = Tag::create([
            "name" => "customers"
        ]);
        $tag3 = Tag::create([
            "name" => "record"
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
        $post4->tags()->attach([$tag1->id, $tag2->id]);
        $post5->tags()->attach([$tag1->id, $tag1->id]);
    }
}
