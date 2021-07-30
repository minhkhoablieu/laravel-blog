<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Slug;
class HomeController extends Controller
{


    public function index()
    {
        $posts = Post::latest()->published()->paginate(5);

        return view('home.index',[
            'posts' => $posts,
        ]);
    }

    public function show($slug)
    {
        $slug = Slug::where('key', $slug)->first();

        if(!is_null($slug))
        {

            $model = app($slug->reference_type);

            switch ($slug->reference_type)
            {
                case "App\Models\Page":
                    $data = $model->whereId($slug->reference_id)->first();
                    return view("page.show", ['page' => $data]);

                case "App\Models\Post":
                    $data = $model->whereId($slug->reference_id)->first();
                    return view('post.show', ['post' => $data]);
            }
        }

        abort(404);
        return null;
    }


}
