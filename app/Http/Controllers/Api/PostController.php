<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\PutRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function all(){
        return response()->json(Cache::remember('post_all', now()->addMinutes(10), function(){
            return Post::all();
        }));
    }

    public function index()
    {
        return response()->json(Post::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        return response()->json(Post::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    //public function show(Post $post)
    //{
    //    return response()->json(Post::$post);
    //}

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json('ok');
    }
}
