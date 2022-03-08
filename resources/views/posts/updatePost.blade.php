@extends("layouts.BaseLayout")
@section("content")
<div class="container my-5">
    <form class="form-control" method="POST" action="{{route('posts.update', $post['id'])}}" >
        @csrf
        @method("PUT")
     <div class="mb-3">
            <label  class="form-label">ID</label>
            <input type="text" disabled name="title" class="form-control" value ="{{$post['id']}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value ="{{$post['title']}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text"  name="description" class="form-control" value ="{{$post['desc']}}" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="file"  name="image" class="form-control" value ="{{$post['image']}}" >
        </div>
        <div class="mb-3">
            <select class="form-select" name="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user['id']}}" @if($user['id'] == $post["user_id"]) selected @endif>
                        {{ $user['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
            <a  type="button" class="btn btn-warning" href="{{route('posts.index')}}">return</a>
        </div>
    </form>
</div>
@endsection
