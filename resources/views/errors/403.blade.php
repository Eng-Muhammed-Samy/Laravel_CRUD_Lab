@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code')
    <div>
    <img width="200" height="200" src="https://www.wpbeginner.com/wp-content/uploads/2016/03/403forbiddenerror.jpg">
    </div>
@endsection
@section('message')
    <p>You Are not Author of the Post</p>
    <div>
        <a href="{{route('posts.index')}}" class="btn btn-sm btn-outline-secondary">return</a>
    </div>
@endsection
