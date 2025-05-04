@extends('layouts.master')

@section('title', 'Edit price')
@section('pageTitle', 'Edit price')

@section('content')
    <div class="card col-md-11 center-form">
        <div class="col-md-11 center-form">
            <div class="card-body">
                <form method="POST" action="{{ route('prices.update', $price->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Title Field -->
                    <div class="form-group">
                        <label for="name">Amount</label>
                        <input type="text" name="amount" id="amount"
                               class="form-control @error('amount') is-invalid @enderror"
                               value="{{ old('amount', $price->amount) }}" required>
                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .center-form{
            margin: auto;
        }
    </style>
@endsection
