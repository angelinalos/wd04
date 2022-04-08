@extends('layouts.admin')
@section('content')
    <div class="grid-form">
        <div class="grid-form1">
            <h3 id="forms-example" class="">Add article</h3>
            <form action="{{route('country.update', ['country'=>$country->id])  }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label >Name</label>
                    <input type="text" name="name" class="form-control" value="{{$country->name}}">
                </div>
                <div class="form-group">
                    <label>Country code</label>

                    <input type="text" name="country_code" class="form-control"> {{$country->country_code}}
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    </div>
@endsection
