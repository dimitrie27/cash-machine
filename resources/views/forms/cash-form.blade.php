@extends('base')

@section('content')
    <h4>Cash Form</h4>
@endsection

@section('container')
    <form method="POST" action="{{ route('storeCash') }}"
        class="border border-info rounded">
        @csrf
        <div class="form-row">
            @foreach ($banknoteTypes as $type)
                <div class="form-group col-md-6">
                    <label for="quantityType{{$type}}">Quantity of type {{ $type }}</label>
                    <input id="quantityType{{$type}}" name="quantityType{{$type}}"
                        type="number" class="form-control" min="0"
                        value="{{ old('quantityType' . $type) ?: 0 }}">

                    @error('quantityType{{$type}}')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach
        </div>
        @error('total')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if(session('transactionError'))
            <div class="alert alert-danger">{{ session('transactionError') }}</div>
        @endif

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
