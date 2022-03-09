@extends("../layouts.app")
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
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value ="{{$post['title']}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text"  name="description" class="form-control @error('description') is-invalid @enderror" value ="{{$post['description']}}" >
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <select class="form-select" name="user_id" disabled>
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
