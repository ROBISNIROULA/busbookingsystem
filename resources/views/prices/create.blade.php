@extends('layouts.master')
@section('title', 'Add price')
@section('pageTitle','Add price')
@section('content')
    <div class="card col-md-11 center-form">
        <div class="col-md-11 center-form">

            <div class="card-body">

                <!-- Form for Creating Post -->
                <div class="justify-content-center ">
                <form method="POST" action="{{ route('prices.store') }}">
                    @csrf

                    <!-- Title Field -->
                    <div class="form-group">
                        <label for="title">Route</label>
                        <input type="text" name="route_id" id="route_id"
                               class="form-control @error('route_id') is-invalid @enderror" value="{{ old('route_id') }}"
                               required>
                        @error('route_id')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Amount</label>
                        <input type="string" name="amount" id="amount"
                               class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}"
                               required>
                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="" selected disabled>Select Status</option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Paid</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Unpaid</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
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
