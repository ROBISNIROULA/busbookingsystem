@extends('layouts.master')

@section('title', 'Bus Details')
@section('pageTitle', 'Bus Details')

@section('content')
    <section class="content">

        <!-- Post Details Box -->
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $bus->name }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($bus->status == 1)
                                <p style="color:Green">Active</p>
                            @else
                                <p style="color:Red">Inactive</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $bus->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $bus->updated_at }}</td>
                    </tr>
                    <tr>
                        {{ $buses }}
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ route('bus.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Bus
                </a>
                <a href="{{ route('bus.edit', $bus->id) }}" class="btn btn-primary float-right">
                    <i class="fas fa-edit"></i> Edit Bus
                </a>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection
