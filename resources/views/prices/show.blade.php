@extends('layouts.master')

@section('title', 'Price List')
@section('pageTitle', 'Price List')

@section('content')
    <section class="content">

        <!-- Post Details Box -->
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Amount</th>
                        <td>{{ $price->amount }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($price->status == 1)
                                <p style="color:Green">Paid</p>
                            @else
                                <p style="color:Red">Unpaid</p>
                            @endif
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>Created At</th>
                        <td>{{ $bus->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $bus->updated_at }}</td>
                    </tr> --}}
                    <tr>
                        {{ $price }}
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ route('prices.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Price
                </a>
                <a href="{{ route('prices.edit', $bus->id) }}" class="btn btn-primary float-right">
                    <i class="fas fa-edit"></i> Edit Price
                </a>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection
