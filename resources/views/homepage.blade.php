@extends('base')

@section('content')
    <h2> Money Source </h2>
    <a href="{{ route('handleCash') }}" type="button" class="btn btn-primary btn-lg">Cash</a>
    <a href="{{ route('handleCreditCard') }}" type="button" class="btn btn-primary btn-lg">Credit Card</a>
    <a href="{{ route('handleBankTransfer') }}" type="button" class="btn btn-primary btn-lg">Bank Transfer</a>

    @if (session('result'))
        <h3> Result: </h3>
        <p>ID: {{ session('result')->id }}</p>
        <p>Total: {{ session('result')->totalAmount }}</p>
        <p>Inputs: {{ session('result')->inputs }}</p>
    @endif
@endsection
