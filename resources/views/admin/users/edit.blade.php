<!-- resources/views/admin/subjects/edit.blade.php -->

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
                                <h5>Edit Subject</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="SubjectName">Subject Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('subject_name') is-invalid @enderror" id="SubjectName" name="subject_name" value="{{ old('subject_name', $subject->subject_name) }}" required>
                                            @error('subject_name')
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
                                                @foreach($classes as $class)
                                                    <option value="{{ $class->id }}" {{ old('class_id', $subject->class_id) == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                                                @endforeach
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
        <label class="floating-label" for="MainImage">Main Image</label>
        <input type="file" class="form-control @error('main_image') is-invalid @enderror" id="MainImage" name="main_image">
        @error('main_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @if($subject->files->where('file_type', 'main_image')->first())
            <img src="{{ asset('storage/' . $subject->files->where('file_type', 'main_image')->first()->file_path) }}" alt="Main Image" class="img-thumbnail" style="max-width: 200px;">
        @endif
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
        @if($subject->files->where('file_type', 'image')->count() > 0)
            <div class="row">
                @foreach($subject->files->where('file_type', 'image') as $image)
                    <div class="col-sm-3">
                        <img src="{{ asset('storage/' . $image->file_path) }}" alt="Secondary Image" class="img-thumbnail" style="max-width: 100px;">
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group">
        <label class="floating-label" for="BookFile">Book File (PDF/EPUB)</label>
        <input type="file" class="form-control @error('book_file') is-invalid @enderror" id="BookFile" name="book_file">
        @error('book_file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @if($subject->files->where('file_type', 'book')->first())
            <a href="{{ asset('storage/' . $subject->files->where('file_type', 'book')->first()->file_path) }}" target="_blank">{{ $subject->files->where('file_type', 'book')->first()->file_name }}</a>
        @endif
    </div>
</div>

                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" type="submit">Update</button>
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