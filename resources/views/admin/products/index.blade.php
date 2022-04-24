@extends('layouts.admin')
@section('content')
    <div class="grid_3 grid_5">
        <h3 class="head-top">Products</h3>

        <div class="but_list">
            <div class="col-md-12 page_1">
                <p><a href="{{ route('product.create') }} " class="btn btn-danger">Create</a></p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th >№</th>
                        <th >Product name</th>
                        <th >Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$product->name}}</td>
                            <td>
                                <a href="{{route('product.edit',['product'=>$product->id])}}" class="btn btn-xs btn-danger">Edit</a>
                                <form action="{{route('product.destroy', ['product'=>$product->id])}}" method="POST">
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
              {{$products->links('partials.pagination')}}
            <div class="clearfix"> </div>
        </div>
    </div>
@endsection
