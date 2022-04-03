@extends('layouts.admin')
@section('content')
<div class="grid_3 grid_5">
    <h3 class="head-top">Articles</h3>

    <div class="but_list">
        <div class="col-md-12 page_1">
            <p>Add modifier classes to change the appearance of a badge.</p>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th >Heading</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{$article->name}}</td>
                    <td>
                        <a href="{{route('admin.edit-article',['id'=>$article->id])}}" class="btn btn-xs btn-dark">Edit</a>
                        <form action="{{route('admin.delete-article', ['id'=>$article->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-xs btn-dark">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>
@endsection
