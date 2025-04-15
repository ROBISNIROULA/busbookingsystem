@extends('layouts.master')

@section('title', 'Seat Details')
@section('pageTitle', 'Seat Details')

@section('content')
    <section class="content">

        <!-- Post Details Box -->
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $seats->name }}</td>
                    </tr>
                    
                    <tr>
                        <th>Created At</th>
                        <td>{{ $seats->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $seats->updated_at }}</td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ route('seats.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Seat
                </a>
                <a href="{{ route('seats.edit', $seats->id) }}" class="btn btn-primary float-right">
                    <i class="fas fa-edit"></i> Edit Seat
                </a>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection
