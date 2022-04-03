@extends('WD04.loc.resources.views.layouts.admin')
@section('content')
    <div class="grid_3 grid_5">
        <h3 class="head-top">Countries</h3>

        <div class="but_list">
            <div class="col-md-12 page_1">
                <p>Add modifier classes to change the appearance of a badge.</p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th >County name</th>
                        <th >Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($countries as $country)
                        <tr>
                            <td>{{$country->name}}</td>
                            <td>
                                <a href="{{route('admin.edit-country',['id'=>$country->id])}}" class="btn btn-xs btn-dark">Edit</a>
                                <form action="{{route('admin.delete-country', ['id'=>$country->id])}}" method="POST">
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
