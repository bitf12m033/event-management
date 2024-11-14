@extends('layouts.app')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="pcoded-content">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ daily sales section ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6">
                                <h5>User Purchases</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="report-table" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Subject</th>
                                        <th>File Type</th>
                                        <th>Price</th>
                                        <th>Unlocked At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $purchase)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $purchase->user->name }}</td>
                                        <td>{{ $purchase->file->subject->subject_name }}</td>
                                        <td>{{ $purchase->file->file_type }}</td>
                                        <td>{{ $purchase->file->subject->price }}</td>
                                        <td>${{ $purchase->file->subject->price ? number_format($purchase->file->subject->price, 2) : 'N/A' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- [ daily sales section ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>

@endsection