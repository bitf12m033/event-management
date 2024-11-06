<!-- resources/views/admin/users/edit.blade.php -->

@extends('layouts.app')

@section('content')
    @include('layouts.breadcrumbs', ['pageTitle' => $pageTitle, 'breadcrumbs' => $breadcrumbs])

    <div class="pcoded-content">
        <!-- [ Breadcrumb ] start -->
        <!-- redacted -->
        <!-- [ Breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6">
                                <h5>Edit User</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="Name">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="Name" name="name" value="{{ old('name', $user->name) }}" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="Email">Email <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="Email" name="email" value="{{ old('email', $user->email) }}" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                
                                   


                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
@endsection