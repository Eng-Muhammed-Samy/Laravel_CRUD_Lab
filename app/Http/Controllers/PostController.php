<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
public function index(){
    $posts=Post::orderBy("id","asc")->paginate(3);

    return view("index", ["posts"=>$posts]);
}

public function create(){
    $users=User::all();
    return view('posts.addNewUser',  ["users"=> $users]);
}

function show($post){
   $p = Post::find($post);
    return view("posts.viewPost", ["post"=>$p]);
}

function edit($post){
    $p = Post::find($post);
    $users = User::all();
    return view('posts.updatePost', ["post"=>$p, "users"=>$users]);
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

    $imageName = time().$store_post['image']->getClientOriginalName();

    $path = 'storage/images';
    $newPost = new Post();
    $newPost["user_id"] = $store_post["user_id"];
    $newPost["title"] = $store_post["title"];
    $newPost["desc"] = $store_post["description"];
    $newPost['image'] = $imageName;
    request("image")->move($path,$imageName);
    $newPost->save();
    return to_route("posts.index");
}

function destroy($post){
    Post::find($post)->delete();
    return to_route('posts.index');
}

function getDeletedUsers(){
    $allPosts = Post::orderBy('id', 'asc')->onlyTrashed()->paginate(3);
    return view('posts.deletePosts', ['posts'=>$allPosts]);
}

function restore($post){
    Post::onlyTrashed()->find($post)->restore();
    return to_route('posts.index');
}
}
