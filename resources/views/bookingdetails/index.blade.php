@extends('layouts.master')
@section('title', 'All Booking Details')
@section('pageTitle','Booking Details')
@section('content')
    <section class="content">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">

                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>User ID</th>
                            <th>Seat ID</th>
                            <th>Route ID</th>
                            <th>Price ID</th>
                            <th>Booked Date</th>
                            <th>Bus ID</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data['rows'] as $i => $row)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$row->user_id}}</td>
                                <td>{{$row->seat_id}}</td>
                                <td>{{$row->route_id}}</td>
                                <td>{{$row->price_id}}</td>
                                <td>{{$row->booked_date}}</td>
                                <td>{{$row->bus_id}}</td>

                                <td>
                                    <a href="{{route('bookingdetails.show',$row->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{route('bookingdetails.edit',$row->id)}}"  class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                    <form action="{{route('bookingdetails.destroy',$row->id)}}" method="post" class="d-inline">
                                        <input type="hidden" name="_method" value="delete" />
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.card-body -->

                </div>
            </div>
            <!-- /.card -->

        </section>
    </section>
    <!-- /.content -->
@endsection

@section('style')
    <style>
        .center-form{
            margin: auto;
        }
    </style>
@endsection
