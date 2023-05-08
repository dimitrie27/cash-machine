@extends('base')

@section('content')
    <h4>Credit Card Form</h4>
@endsection

@section('container')
    <form method="POST" action="{{ route('storeCreditCard') }}"
        class="border border-primary rounded">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cardNo">Card Number</label>
                <input id="cardNo" name="cardNo" type="text"
                    class="form-control" value="{{ old('cardNo') }}">
                @error('cardNo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="expirationDate">Expiration Date</label>
                <input id="expirationDate" name="expirationDate"
                    type="text" class="form-control"
                    placeholder="MM/YYYY" value="{{ old('expirationDate') }}">
                @error('expirationDate')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="cardHolder">Card Holder</label>
                <input id="cardHolder" name="cardHolder" type="text"
                    class="form-control" value="{{ old('cardHolder') }}">
                @error('cardHolder')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="cvv">CVV</label>
                <input id="cvv" name="cvv" type="text"
                    class="form-control" value="{{ old('cvv') }}">
                @error('cvv')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="amount">Amount</label>
                <input id="amount" name="amount" type="number" step="0.01"
                    class="form-control" value="{{ old('amount') }}">
                @error('amount')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        @if(session('transactionError'))
            <div class="alert alert-danger">{{ session('transactionError') }}</div>
        @endif

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
