@extends('layouts.app')

@section('content')

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
                                <a href="{{ route('admin.levels.index') }}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-arrow-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <form action="{{ route('admin.levels.update', $level->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="LevelName">Level Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('level_name') is-invalid @enderror" id="LevelName" name="level_name" value="{{ old('level_name', $level->level_name) }}" placeholder="" required>
                                            @error('level_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <button class="btn btn-danger" type="reset">Clear</button>
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