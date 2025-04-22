@extends('layouts.master')
@section('title', 'Add Booking Details')
@section('pageTitle','Add Booking Details')
@section('content')
    <div class="card col-md-11 center-form">
        <div class="col-md-11 center-form">

            <div class="card-body">

                <!-- Form for Creating Post -->
                <div class="justify-content-center ">
                    <form method="POST" action="{{ route('bookingdetails.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">User ID</label>
                            <input type="text" name="user_id" id="user_id"
                                   class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id') }}"
                                   required>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Seat ID</label>
                            <input type="text" name="seat_id" id="seat_id"
                                   class="form-control @error('seat_id') is-invalid @enderror" value="{{ old('seat_id') }}"
                                   required>
                            @error('seat_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="title">Route ID</label>
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
                            <label for="title">Price ID</label>
                            <input type="text" name="price_id" id="price_id"
                                   class="form-control @error('price_id') is-invalid @enderror" value="{{ old('price_id') }}"
                                   required>
                            @error('price_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <!-- Description Field -->
                        <div class="form-group">
                            <label for="booked date">Booked Date</label>
                            <textarea name="booked date" id="booked date"
                                      class="form-control @error('booked date') is-invalid @enderror" rows="4"
                                      required>{{ old('booked date') }}</textarea>
                            @error('booked date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="title">Bus ID</label>
                            <input type="text" name="bus_id" id="bus_id"
                                   class="form-control @error('bus_id') is-invalid @enderror" value="{{ old('bus_id') }}"
                                   required>
                            @error('bus_id')
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
        .center-form {
            margin: auto;
        }
    </style>
@endsection

@section('script')

    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const file = input.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "#";
                preview.style.display = 'none';
            }
        }
    </script>
@endsection
