@extends('layouts.admin')
@section('content')
    <div class="grid-form">
        <div class="grid-form1">
            <h3 id="forms-example" class="">Add article</h3>
            <form action="{{route('admin.update-article', ['id'=>$article->id])  }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label >Name</label>
                    <input type="text" name="name" class="form-control" value="{{$article->name}}">
                </div>
                <div class="form-group">
                    <label >Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label>Content</label>

                    <textarea name="content" cols="30" class="form-control"> {{$article->content}}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    </div>
@endsection
