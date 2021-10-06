<?php

require_once '../vendor/autoload.php';
require_once '../config/dotenv.php';
require_once '../config/blade.php';
require_once '../config/router.php';
require_once '../config/eloquent.php';

//To fill DB uncomment under

//use \Hillel\Models\Category;
//use \Hillel\Models\Tag;
//use \Hillel\Models\Post;
//
//$categories = [];
//for($i =1 ; $i <=5; $i++) {
//    $categories[] = [
//        'title' => 'Category' . $i,
//        'slug' => 'Categor-'. $i,
//        'created_at' => date('Y-m-d H:i:s'),
//        'updated_at' => date('Y-m-d H:i:s')
//    ];
//}
//Category::insert($categories);
//
//$tags = [];
//for ($i = 1; $i <= 10; $i++) {
//    $tags[] = [
//        'title' => 'Tag' . $i,
//        'slug' => 'Tag-' . $i,
//        'created_at' => date('Y-m-d H:i:s'),
//        'updated_at' => date('Y-m-d H:i:s')
//    ];
//}
//Tag::insert($tags);
//
//$categories = Category::all();
//$posts = [];
//for ($i = 1; $i <= 10; $i++) {
//    $posts[] = [
//        'title' => 'Post' . $i,
//        'slug' => 'Post-' . $i,
//        'body' => 'Post-body' . $i,
//        'category_id' => $categories->random()->id,
//        'created_at' => date('Y-m-d H:i:s'),
//        'updated_at' => date('Y-m-d H:i:s')
//    ];
//}
//Post::insert($posts);
//
//$postsAll = Post::all();
//foreach ($postsAll as $post) {
//    $postsRnd = Post::inRandomOrder()->limit(3)->get();
//    $postsID = $postsRnd->pluck('id')->toArray();
//    $post->tags()->sync($postsID);
//}

/** @var $response */
/**@var $router */
/**@var  $request */
$response = $router->dispatch($request);
echo $response->getContent();
