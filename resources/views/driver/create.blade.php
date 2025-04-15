@extends('layouts.master')
@section('title', 'Add driver')
@section('pageTitle','Add driver')
@section('content')
    <div class="card col-md-11 center-form">
        <div class="col-md-11 center-form">

            <div class="card-body">

                <!-- Form for Creating Post -->
                <div class="justify-content-center ">
                <form method="POST" action="{{ route('driver.store') }}">
                    @csrf

                    <!-- Title Field -->
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" id="title"
                               class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                               required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                      <!-- Title Field -->
                      <div class="form-group">
                        <label for ="title">Mobile</label>
                        <input type="bigInteger" name="mobile" id="mobile"
                              class="form-control @error('mobile') is-valid @enderror" value="{{ old('mobile')}}"
                               required>
                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for ="title">Address</label>
                        <input type="text" name="address" id="address"
                              class="form-control @error('address') is-valid @enderror" value="{{  old('address')}}"
                               required>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for ="title">DOB</label>
                        <input type="dateTime" name="dob" id="dob"
                              class="form-control @error('dob') is-valid @enderror" value="{{  old('dob')}}"
                               required>
                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Image Upload Field -->
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="form-control @error('image') is-invalid @enderror"
                            accept="image/*"
                            onchange="previewImage(this)"
                        >
                        @error('image')
                        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                        @enderror
                    </div>

                    <!-- Image Preview -->
                    <div>
                        <br>
                        <img
                            id="imagePreview"
                            src="#"
                            alt="Image Preview"
                            style="display:none; width:200px; height:200px; object-fit:cover;"
                        >
                    </div>

                    <!-- status Field -->
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                                <option value="" selected disabled>Select status</option>
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