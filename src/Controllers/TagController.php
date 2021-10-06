<?php

namespace Hillel\Controllers;

use Hillel\Models\Post;
use Hillel\Models\Tag;

class TagController
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', ['tags' => $tags]);
    }

    public function form()
    {
        $request = request();

        $data = [];

        $data['post_selected'][] = 0;

        if ($request->method() == 'POST') {
            if (!$request->has('id')) {
                $tags = Tag::create([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug')
                ]);
                $tags->posts()->sync($request->get('PostsList'));
            } else {
                $tags = Tag::find($request->get('id'));
                $tags->update([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug')
                ]);
                $tags->posts()->sync($request->get('PostsList'));
            }

            header('Location: /tags');
        }

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['tag'] = Tag::find($id);
            foreach ($data['tag']->posts as $post) {
                $data['post_selected'][] = $post->id;
            }
        }

        $data['posts'] = Post::All();

        return view('tags.form', $data);
    }

    public function delete()
    {
        $post = Tag::find(request()->route()->parameter('id'));
        $post->delete();

        header('Location: /tags');
    }
}
