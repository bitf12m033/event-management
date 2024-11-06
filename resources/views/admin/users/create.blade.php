<!-- resources/views/admin/users/create.blade.php -->

@extends('layouts.app')

@section('content')
    @include('layouts.breadcrumbs', ['pageTitle' => $pageTitle, 'breadcrumbs' => $breadcrumbs])

    <div class="pcoded-content">
        <!-- [ Breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">{{ $pageTitle }}</h5>
                        </div>
                        <ul class="breadcrumb">
                            @foreach($breadcrumbs as $breadcrumb)
                                @if($breadcrumb['url'])
                                    <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
                                @else
                                    <li class="breadcrumb-item active">{{ $breadcrumb['title'] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6">
                                <h5>Create User</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="Name">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="Name" name="name" value="{{ old('name') }}" required>
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
                                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="Email" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <!-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="MainImage">Main Image <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control @error('main_image') is-invalid @enderror" id="MainImage" name="main_image" required>
                                            @error('main_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> -->

                                   

                                
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" type="submit">Create</button>
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