@extends('../layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                    <div class="card" style="">
                            <img class="card-img-top"  src="{{asset('storage/images/'.$post['image'])}}"/>
                        <div class="card-body">
                            <h5 class="card-title">
                                {{$post['title']}}
                            </h5>
                            <p style="height: 50px; overflow-y: auto" class="card-text">{{$post['description']}}</p>
                            <a class="btn btn-primary" href="{{route('posts.show', $post['id'])}}">Show</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
