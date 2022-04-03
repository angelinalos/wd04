@extends('WD04.loc.resources.views.layouts.admin')
@section('content')
    <div class="grid-form">
        <div class="grid-form1">
            <h3 id="forms-example" class="">Add country</h3>
            <form action="{{route('admin.storage-country')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Country code</label>

                    <input tyoe="text" name="country_code" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    </div>
@endsection
