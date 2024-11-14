<!-- resources/views/admin/subjects/create.blade.php -->

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
                                <h5>Create Subject</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <form action="{{ route('admin.subjects.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="SubjectName">Subject Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('subject_name') is-invalid @enderror" id="SubjectName" name="subject_name" value="{{ old('subject_name') }}" required>
                                            @error('subject_name')
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
                                                    <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>{{ $level->level_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('level_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="Class">Class <span class="text-danger">*</span></label>
                                            <select class="form-control @error('class_id') is-invalid @enderror" id="Class" name="class_id" required>
                                                <option value="">Select Class</option>
                                            </select>
                                            @error('class_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="SubjectPrice">Subject Price <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="SubjectPrice" name="price" value="{{ old('price') }}" required>
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="ShortDescription">Short Description</label>
                                            <textarea class="form-control @error('short_desc') is-invalid @enderror" id="ShortDescription" name="short_desc" rows="3">{{ old('short_desc') }}</textarea>
                                            @error('short_desc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="LongDescription">Long Description</label>
                                            <textarea class="form-control @error('long_desc') is-invalid @enderror" id="LongDescription" name="long_desc" rows="5">{{ old('long_desc') }}</textarea>
                                            @error('long_desc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="MainImage">Main Image <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control @error('main_image') is-invalid @enderror" id="MainImage" name="main_image" required>
                                            @error('main_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="SecondaryImages">Secondary Images</label>
                                            <input type="file" class="form-control @error('secondary_images.*') is-invalid @enderror" id="SecondaryImages" name="secondary_images[]" multiple>
                                            @error('secondary_images.*')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="BookFile">Book File (PDF/EPUB) <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control @error('book_file') is-invalid @enderror" id="BookFile" name="book_file" required>
                                            @error('book_file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" type="submit">Create</button>
                                        <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">Cancel</a>
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

