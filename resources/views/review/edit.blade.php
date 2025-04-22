@extends('layouts.master')

@section('title', 'Edit Review')
@section('pageTitle', 'Edit Review')

@section('content')
    <div class="card col-md-11 center-form">
        <div class="col-md-11 center-form">
            <div class="card-body">
                <form method="POST" action="{{ route('review.update', $review->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Title Field -->
                    {{-- <div class="form-group">
                        <label for="title">User_ID</label>
                        <input type="text" name="user_id" id="user_id"
                               class="form-control @error('user_id') is-invalid @enderror"
                               value="{{ old('user_id', $review->user_id) }}" required>
                        @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> --}}

                    <!-- Description Field -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"
                                  class="form-control @error('description') is-invalid @enderror"
                                  rows="4" required>{{ old('description', $review->description) }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- <!-- Status Field -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror" required>
                            <option value="" disabled>Select Status</option>
                            <option value="1" {{ old('status', $post->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $post->status) == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> --}}

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
