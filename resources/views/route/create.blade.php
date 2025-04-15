@extends('layouts.master')
@section('title', 'Add Route')
@section('pageTitle','Add Route')
@section('content')
    <div class="card col-md-11 center-form">
        <div class="col-md-11 center-form">

            <div class="card-body">

                <!-- Form for Creating Post -->
                <div class="justify-content-center ">
                <form method="POST" action="{{ route('route.store') }}">
                    @csrf

                    <!-- Title Field -->
                    <div class="form-group">
                        <label for="Source">Source</label>
                        <input type="text" name="source" id="source"
                               class="form-control @error('source') is-invalid @enderror" value="{{ old('source') }}"
                               required>
                        @error('source')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Destination">Destination</label>
                        <input type="text" name="destination" id="destination"
                               class="form-control @error('destination') is-invalid @enderror" value="{{ old('destination') }}"
                               required>
                        @error('destination')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                            
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input 
                            type="text" 
                            name="price" 
                            id="price" 
                            class="form-control @error('price') is-invalid @enderror" 
                            value="{{ old('price', $item->price ?? '') }}" 
                            placeholder="Enter price"
                            required
                        >
                    
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    


                                      <!-- Status Field -->
                                      <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                                                required>
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
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
