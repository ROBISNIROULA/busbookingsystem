@extends('layouts.master')

@section('title', 'Booking Details')
@section('pageTitle', 'Booking Details')

@section('content')
    <section class="content">

        <!-- Post Details Box -->
        <div class="card">
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th width="30%">User ID</th>
                        <td>{{ $bookingdetails->user_id }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Seat ID</th>
                        <td>{{ $bookingdetails->seat_id }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Route ID</th>
                        <td>{{ $bookingdetails->route_id }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Price ID</th>
                        <td>{{ $bookingdetails->price_id }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Booked Date</th>
                        <td>{{ $bookingdetails->booked_date }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Bus ID</th>
                        <td>{{ $bookingdetails->bus_id }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($post->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{ $post->creator->name ?? 'Unknown' }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $post->created_at->format('M d, Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $post->updated_at->format('M d, Y H:i:s') }}</td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ route('bookingdetails.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Posts
                </a>
                <a href="{{ route('bookingdetails.edit', $post->id) }}" class="btn btn-primary float-right">
                    <i class="fas fa-edit"></i> Edit Post
                </a>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection

@section('styles')
    <style>
        .table th {
            background-color: #f8f9fa;
        }
        .badge {
            padding: 5px 10px;
            font-size: 14px;
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection
