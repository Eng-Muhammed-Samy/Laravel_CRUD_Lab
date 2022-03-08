@extends("layouts.BaseLayout")
@section("content")
<div class="container my-5">
    <form class="form-control" method="POST" action="{{route('posts.store')}}">
        @csrf;
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value ="">
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text"  name="description" class="form-control" value ="" >
        </div>

        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
            <a class="btn btn-warning"  type="button" href="{{route('posts.index')}}">return</a>
        </div>
    </form>
</div>
@endsection
