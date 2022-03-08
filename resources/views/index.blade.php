@extends('layouts/BaseLayout')
@section("content")
<!-- Add new user button -->
    <div class="text-center my-5">
            <a href="{{route('posts.create')}}" class="btn btn-success">Add New User</a>
            <div class="text-center">
                <hr>
            </div>
            <!-- add table -->
    <div class="my-5">
    <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>view</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post["id"]}}</td>
                        <td>{{$post["title"]}}</td>
                        <td>{{$post["desc"]}}</td>
                        <td><a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">view</a></td>
                        <td><a href="{{route('posts.edit', $post['id'])}}" class="btn btn-warning">update</a></td>
                        <form method="POST" action="{{route('posts.destroy', $post['id'])}}">
                            @csrf
                            @method('delete')
                            <td><input type="submit" class="btn btn-danger" value="delete"/>
                        </form>
                    </tr>
                @endforeach
            </tbody>
    </table>
    </div>


@endsection
