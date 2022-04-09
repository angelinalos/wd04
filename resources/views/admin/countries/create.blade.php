@extends('layouts.admin')
@section('content')
    <div class="grid-form">
        <div class="grid-form1">
            <h3 id="forms-example" class="">Add country</h3>
            <form action="{{route('country.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label  >Name</label>
                    <input type="text" name="name" class="form-control is-invalid">
                </div>
                  @if($errors->has('name'))
                      @foreach($errors->get('name') as $errorMessage)
                        <div class="alert alert-danger" role="alert">
                                     {{ $errorMessage }}
                        </div>
                    @endforeach
                @endif
                <div class="form-group">
                    <label>Country code</label>

                    <input type="text" name="country_code" class="form-control">
                </div>
                @if($errors->has('country_code'))
                    @foreach($errors->get('country_code') as $errorMessage)
                        <div class="alert alert-danger" role="alert">
                            {{ $errorMessage }}
                        </div>
                    @endforeach
                @endif
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    </div>
@endsection
