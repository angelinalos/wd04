@extends('layouts.admin')
@section('content')
    <div class="grid-form">
        <div class="grid-form1">
            <h3 id="forms-example" class="">Edit category</h3>
            <form action="{{route('category.update', compact('category'))}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                </div>
            @if($category->image)
                    <img src="{{asset($category->image)}} " alt="">
            @endif
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Parent's category</label>
                    <select type="text" name="parent_category" class="form-control">
                        <option value="0" selected>No parent</option>
                        @foreach($categories as $parentCategory)
                            <option value="{{$parentCategory->id}}" {{$parentCategory->id === $category->parent_category ? 'selected' : ''}}>{{$parentCategory->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    </div>
@endsection
