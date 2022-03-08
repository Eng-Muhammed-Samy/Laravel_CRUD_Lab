@extends("layouts.BaseLayout")
@section("content")
<div class="container">
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{$post['id']}}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{$post['title']}}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{$post['desc']}}</td>
        </tr>
    </table>
</div>
@endsection
