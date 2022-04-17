@extends('layouts.admin')
@section('content')
    <div class="grid-form">
        <div class="grid-form1">
            <h3 id="forms-example" class="">Edit product</h3>
            <form action="{{route('product.update', compact('product'))}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                </div>
            @if($product->picture)
                    <img src="{{asset($product->picture)}} " alt="">
            @endif
                <div class="form-group">
                    <label>Picture</label>
                    <input type="file" name="picture" class="form-control">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control" value="{{$product->description}}"></textarea>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" value="{{$product->price}}">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select type="text" name="category_id" class="form-control">
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
