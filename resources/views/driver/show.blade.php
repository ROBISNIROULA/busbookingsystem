@extends('layouts.master')
@section('title', ' Driver')
@section('pageTitle',' Driver')
@section('content')
    <section class="content">

        <!-- Post Details Box -->
        <div class="card">
            <div class="card-body">
                 <!-- Image Display -->
                 @if($driver->image)
                 <div class="text-center mb-4">
                     <img src="{{ asset('storage/'.$driver->image) }}"
                          alt="Post Image"
                          class="img-fluid rounded"
                          style="max-height: 300px;">
                 </div>
             @endif
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $driver->name }}</td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <td>{{ $driver->mobile }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $driver->address }}</td>
                    </tr>
                    <tr>
                        <th>DOB</th>
                        <td>{{ $driver->dob }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($driver->status == 1)
                                <p style="color:Green">Active</p>
                            @else
                                <p style="color:Red">Inactive</p>
                            @endif
                        </td>
                    </tr>

                    {{-- <tr>
                        <th>Created At</th>
                        <td>{{ $category->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $category->updated_at }}</td>
                    </tr> --}}
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ route('driver.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Driver
                </a>
                <a href="{{ route('driver.edit', $driver->id) }}" class="btn btn-primary float-right">
                    <i class="fas fa-edit"></i> Edit Driver
                </a>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection