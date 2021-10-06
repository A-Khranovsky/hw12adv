<?php

namespace Hillel\Controllers;

use Hillel\Models\Post;
use Hillel\Models\Tag;
use Hillel\Models\Category;

class PostController
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function form()
    {
        $request = request();

        $data = [];

        $data['tags_selected'][] = 0;

        if ($request->method() == 'POST') {
            if (!$request->has('id')) {
                $post = Post::create([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                    'body' => $request->get('body'),
                    'category_id' => $request->get('CategoriesList')[0]
                ]);
                $post->tags()->sync($request->get('TagsList'));
            } else {
                $post = Post::find($request->get('id'));
                $post->update([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                    'body' => $request->get('body'),
                    'category_id' => $request->get('CategoriesList')[0]
                ]);
                $post->tags()->sync($request->get('TagsList'));
            }

            header('Location: /posts');
        }

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['post'] = Post::find($id);
            foreach ($data['post']->tags as $tag) {
                $data['tags_selected'][] = $tag->id;
            }
        }

        $data['categories'] = Category::All();
        $data['tags'] = Tag::All();

        return view('posts.form', $data);
    }

    public function delete()
    {
        $post = Post::find(request()->route()->parameter('id'));
        $post->delete();

        header('Location: /posts');
    }
}
