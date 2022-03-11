<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts=Post::orderBy("id","asc")->paginate(6);

        return view("index", ["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('posts.addNewUser',  ["users"=> $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $request = $request->all();
        if(array_key_exists("image", $request)) {
            $imageName = time() . $request['image']->getClientOriginalName();
            $path = 'storage/images';
            $request["image"]->move($path,$imageName);
            $request['image'] = $imageName;
        }
//        dd($request);
        $request['user_id'] = Auth::user()->id;
        Post::create($request);

        return to_route("posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("posts.viewPost", ["post"=>$post]);//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($this->authorize('edit', $post)) {
            $users = User::all();
            return view('posts.updatePost', ["post" => $post, "users" => $users]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if($this->authorize('update', $post)) {
            $post->update($request->all());
            return to_route('posts.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($this->authorize('delete', $post)) {
            $post->delete();
            return to_route('posts.index');
        }
    }

    function getDeletedUsers(){
        $allPosts = Post::orderBy('id', 'asc')->onlyTrashed()->paginate(3);
        return view('posts.deletePosts', ['posts'=>$allPosts]);
    }

    function restore($post){
        Post::onlyTrashed()->find($post)->restore();
        return to_route('posts.index');
    }
    function getMyPosts(){
        $myPosts = Auth::user()->posts;
        return view('posts.homePage', ['posts'=>$myPosts]);
    }
}
