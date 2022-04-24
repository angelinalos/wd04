@extends('layouts.admin')
@section('content')
    <div class="grid_3 grid_5">
        <h3 class="head-top">Categories</h3>

        <div class="but_list">
            <div class="col-md-12 page_1">
                <p><a href="{{ route('category.create') }} " class="btn btn-danger">Create</a></p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th >№</th>
                        <th >Category name</th>
                        <th>Image</th>
                        <th >Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$category->name}}</td>
                            <td>{{asset($category->image)}}</td>
                            <td>
                                <a href="{{route('category.edit',['category'=>$category->id])}}" class="btn btn-xs btn-danger">Edit</a>
                                <form action="{{route('category.destroy', ['category'=>$category->id])}}" method="POST">
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
              {{$categories->links('partials.pagination')}}
            <div class="clearfix"> </div>
        </div>
    </div>
@endsection
