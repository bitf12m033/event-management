@extends('layouts.app')

@section('content')

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
            <!-- [ daily sales section ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6">
                                <h5>Edit Class</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <form action="{{ route('admin.classes.update', $class->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="ClassName">Class Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('class_name') is-invalid @enderror" id="ClassName" name="class_name" value="{{ old('class_name', $class->class_name) }}" required>
                                            @error('class_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="Level">Level <span class="text-danger">*</span></label>
                                            <select class="form-control @error('level_id') is-invalid @enderror" id="Level" name="level_id" required>
                                                <option value="">Select Level</option>
                                                @foreach($levels as $level)
                                                    <option value="{{ $level->id }}" {{ $class->level_id == $level->id ? 'selected' : '' }}>{{ $level->level_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('level_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <a href="{{ route('admin.classes.index') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ daily sales section ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>

@endsection