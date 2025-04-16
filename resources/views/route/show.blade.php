@extends('layouts.master')

@section('title', 'Route Details')
@section('pageTitle', 'Route Details')

@section('content')
    <section class="content">

        <!-- Post Details Box -->
        <div class="card">
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Source</th>
                        <td>{{ $route->source }}</td>
                    </tr>
                    <tr>
                        <th>Destination</th>
                        <td>{!! nl2br(e($route->destination)) !!}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($route->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{ $route->creator->name ?? 'Unknown' }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $route->created_at->format('M d, Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $route->updated_at->format('M d, Y H:i:s') }}</td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ route('route.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to route
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
