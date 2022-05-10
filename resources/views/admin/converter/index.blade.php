@extends('layouts.admin')
@section('content')

    <div class="grid-form">
        <div class="grid-form1">
            @if(session('conversion'))
                <div class="form-group">
                    <label for="by">Result</label>
                    <input class="form-control" value="{{session('conversion')}}">
                </div>
            @endif
            <h3 id="forms-example" class="">Converter</h3>
            <form action="{{route('converter.index')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="from">From</label>
                    <select name="from" type="text" class="form-control">
                    @foreach($items as $item)
                            <option type="input" name="cur" class="form-control" value="{{$item->item_Calc}}">{{$item->item_Cur}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="by">BY</label>
                    <input type="number" name="amount" class="form-control">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <span name="date" class="form-control">{{$item->item_Date}}</span>
                </div>

                <button type="submit" class="btn btn-default">Convert</button>
            </form>
        </div>

    </div>
@endsection
