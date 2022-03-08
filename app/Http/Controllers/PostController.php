<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
public function index(){
    $posts = Post::all();
    return view("index", ["posts"=>$posts]);
}

public function create(){
    return view('posts.addNewUser');
}

function show($post){
   $p = Post::find($post);
    return view("posts.viewPost", ["post"=>$p]);
}

function edit($post){
    $p = Post::find($post);
    return view('posts.updatePost', ["post"=>$p]);
}

function update($post){
    $p = Post::find($post);
    $p['title'] = request('title');
    $p['desc'] = request('description');
    $p->save();
    return to_route('posts.index');
}

function store(){
    $store_post = request()->all();

    $newPost = new Post();
    $newPost["title"] = $store_post["title"];
    $newPost["desc"] = $store_post["description"];

    $newPost->save();
    return to_route("posts.index");
}

function destroy($post){
    Post::find($post)->delete();
    return to_route('posts.index');
}
}
