@extends('layouts.master')
@section('title', 'Add bus')
@section('pageTitle','Add bus')
@section('content')
    <div class="card col-md-11 center-form">
        <div class="col-md-11 center-form">

            <div class="card-body">

                <!-- Form for Creating Post -->
                <div class="justify-content-center ">
                <form method="POST" action="{{ route('bus.store') }}">
                    @csrf

                    <!-- Title Field -->
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                               required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Bus Number</label>
                        <input type="string" name="bus_number" id="bus_number"
                               class="form-control @error('bus_number') is-invalid @enderror" value="{{ old('bus_number') }}"
                               required>
                        @error('bus_number')
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
