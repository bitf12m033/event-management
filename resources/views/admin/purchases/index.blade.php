@extends('layouts.app')

@section('content')
<div class="pc-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>User Purchases</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Subject</th>
                                        <th>File Type</th>
                                        <th>Purchase Date</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->user->name }}</td>
                                        <td>{{ $purchase->file->subject->subject_name }}</td>
                                        <td>{{ $purchase->file->file_type }}</td>
                                        <td>{{ $purchase->unlocked_at ? \Carbon\Carbon::parse($purchase->unlocked_at)->format('Y-m-d H:i:s') : 'N/A' }}</td>                                        <td>${{ number_format($purchase->file->subject->price, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection