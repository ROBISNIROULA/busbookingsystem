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
                        <th>Price</th>
                        <td>{{ $route->Price }}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{ $route->category->name ?? 'N/A' }}</td>
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
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Posts
                </a>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary float-right">
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
