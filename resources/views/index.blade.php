@extends('layouts.app')

@section('content')
<!-- Add new user button -->
    <div class="container text-center">
            <a href="{{route('posts.create')}}" class="btn btn-outline-success">Add New Post</a>
            <div class="text-center">
            </div>
            <!-- add table -->
    <div class="my-3">
    <table class="table">
            <thead>
                <tr class="bg-dark text-light">
                    <th>ID</th>
                    <th>User_ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>view</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post["id"]}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post["title"]}}</td>
                        <td>{{$post["description"]}}</td>
                        <td><img width="50px" height="50px" src="{{asset('storage/images/'.$post['image'])}}" alt={{$post["image"]}} srcset=""></td>
                        <td><a href="{{route('posts.show',$post['id'])}}" class="btn btn-sm btn-info">view</a></td>
                        <td><a href="{{route('posts.edit', $post['id'])}}" class="btn btn-sm btn-warning">update</a></td>
                        <td><button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">delete</button></td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are You Sure You Want To Delete This Post
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                                            @csrf
                                            @method("delete")
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
    </table>
        {{ $posts->links() }}
    </div>


@endsection
