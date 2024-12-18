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
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Add User</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="report-table" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <!-- <th>Image</th> -->
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <!-- <th>Sex</th> -->
                                        <!-- <th>Birth Date</th> -->
                                        <!-- <th>Age</th> -->
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <!-- <td>
                                                <img src="{{ asset('assets/images/user/avatar-2.jpg')}}" class="img-fluid img-radius wid-40" alt="">
                                            </td> -->
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone}}</td>
                                            <!-- <td></td>
                                            <td></td>
                                            <td></td> -->
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.purchases', $user->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="feather icon-list"></i>&nbsp;Purchase History
                                                </a>
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete-button"><i class="feather icon-trash-2"></i>&nbsp;Delete </button>
                                                </form>
                                            </td>
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

<script>
     
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const form = this.closest('form');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>

@endsection