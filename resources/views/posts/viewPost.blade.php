@extends("layouts.BaseLayout")
@section("content")
<div class="container my-5">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="card" style="width: 18rem">
                <img src="{{asset('storage/images/'.$post['image'])}}" class="card-img-top p-2 pt-4" alt="{{$post['title']}}">
                <hr/>
                <div class="card-body">
                    <h5 class="card-title">{{$post['title']}}</h5>
                    <p class="card-text">{{$post['desc']}}</p>
                    <a href="{{route('posts.index')}}" class="btn btn-primary">return</a>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection
