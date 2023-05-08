@extends('base')

@section('content')
    <h4>Bank Transfer Form</h4>
@endsection

@section('container')
    <form method="POST" action="{{ route('storeBankTransfer') }}"
        class="border border-primary rounded">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="transferDate">Transfer Date</label>
                <input id="transferDate" name="transferDate"
                    type="text" class="form-control"
                    placeholder="DD/MM/YYYY" value="{{ old('transferDate') }}">
                @error('transferDate')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="customerName">Customer Name</label>
                <input id="customerName" name="customerName" type="text"
                    class="form-control" value="{{ old('customerName') }}">
                @error('customerName')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="accountNo">Account Number</label>
                <input id="accountNo" name="accountNo" type="text"
                    class="form-control" value="{{ old('accountNo') }}">
                @error('accountNo')
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
