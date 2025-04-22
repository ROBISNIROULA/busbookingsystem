@extends('layouts.master')

@section('title', 'Edit Booking Details')
@section('pageTitle', 'Edit Booking Details')

@section('content')
    <div class="card col-md-11 center-form">
        <div class="col-md-11 center-form">
            <div class="card-body">
                <form method="POST" action="{{ route('bookingdetails.update', $bookingdetails->id) }}">
                    @csrf
                    @method('PUT')

                    {{-- <!-- Source Field -->
                    <div class="form-group">
                        <label for="Source">Source</label>
                        <input type="text" name="source" id="source"
                               class="form-control @error('source') is-invalid @enderror"
                               value="{{ old('source', $route->source) }}" required>
                        @error('source')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> --}}

                    <!-- Destination Field -->
                    <div class="form-group">
                        <label for="booked date">Booked Date</label>
                        <textarea name="booked date" id="booked date"
                                  class="form-control @error('booked date') is-invalid @enderror"
                                  rows="4" required>{{ old('booked date', $seat->booked date}}</textarea>
                        @error('booked date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    // {{-- <div class="form-group">
                    //     <label for="Price">Price</label>
                    //     <input type="text" name="Price" id="Price" class="form-control" value="{{ old('Price', $route->Price) }}" placeholder="Enter price">
                    //     class="form-control @error('price') is-invalid @enderror" rows="4"
                    //     required>{{ old('price') }}</textarea>
                    //     @error('price')
                    //     <span class="invalid-feedback" role="alert">
                    //         <strong>{{ $message }}</strong>
                    //     </span>
                    // </div> --}}

                    <!-- Status Field -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror" required>
                            <option value="" disabled>Select Status</option>
                            <option value="1" {{ old('status', $route->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $route->status) == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
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
