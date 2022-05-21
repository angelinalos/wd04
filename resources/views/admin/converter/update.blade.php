@extends('layouts.admin')
@section('content')
    <div class="grid-form">
        <div class="grid-form1">
            <h3 id="forms-example" class="">Converter</h3>
            <form action="{{ route('converter.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div>{{'conversion'}}</div>
                    <label for="from">From</label>
                    <select name="select" type="text" class="form-control">
                        @foreach($items as $item)
                            <option type="input" name="cur" class="form-control" value="{{old('cur')}}">{{$item->item_Cur}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="by">BY</label>
                    <input type="number" name="number" class="form-control">
                </div>

                <button type="submit" class="btn btn-default">Convert</button>
            </form>
        </div>

    </div>
@endsection
