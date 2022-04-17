@extends('layouts.admin')
@section('content')
    <div class="grid-form">
        <div class="grid-form1">
            <h3 id="forms-example" class="">Add product</h3>
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                </div>

                <div class="form-group">
                    <label>Picture</label>
                    <input type="file" name="picture" class="form-control">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select type="text" name="category_id" class="form-control">
                    <option value="0">Category</option>
                        <option value="1">Category1</option>

                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    </div>
@endsection
