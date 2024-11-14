<!-- resources/views/admin/subjects/edit.blade.php -->
<?php 
// Set PHP configurations for larger file uploads
ini_set('upload_max_filesize', '100M');
ini_set('post_max_size', '100M');
ini_set('max_execution_time', '300'); // Optional: increase max execution time
ini_set('max_input_time', '300'); // Optional: increase max input time

?>
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
                                            <label class="floating-label" for="Level">Level <span class="text-danger">*</span></label>
                                            <select class="form-control @error('level_id') is-invalid @enderror" id="Level" name="level_id" required>
                                                <option value="">Select Level</option>
                                                @foreach($levels as $level)
                                                <option value="{{ $level->id }}" {{ old('level_id', $subject->level_id) == $level->id ? 'selected' : '' }}>{{ $level->level_name }}</option>
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
                                            <label class="floating-label" for="SubjectPrice">Subject Price <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="SubjectPrice" name="price" value="{{ old('price',$subject->price) }}" required>
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
                                            <textarea class="form-control @error('short_desc') is-invalid @enderror" id="ShortDescription" name="short_desc" rows="3">{{ old('short_desc',$subject->short_desc) }}</textarea>
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
                                            <textarea class="form-control @error('long_desc') is-invalid @enderror" id="LongDescription" name="long_desc" rows="5">{{ old('long_desc' , $subject->long_desc) }}</textarea>
                                            @error('long_desc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="MainImage">Main Image</label>
                                            <input type="file" class="form-control @error('main_image') is-invalid @enderror" id="MainImage" name="main_image" accept="image/png, image/jpeg">
                                            @error('main_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if($subject->files->where('file_type', 'main_image')->first())
                                                <img accept="image/png, image/jpeg" src="{{ asset('storage/' . $subject->files->where('file_type', 'main_image')->first()->file_path) }}" alt="Main Image" class="img-thumbnail" style="max-width: 200px;">
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('#Level').change(function() {
            var levelId = $(this).val();
            if(levelId) {
                $.ajax({
                    url: '/admin/get-classes-by-level/' + levelId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#Class').empty();
                        $('#Class').append('<option value="">Select Class</option>');
                        $.each(data, function(key, value) {
                            $('#Class').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            } else {
                $('#Class').empty();
                $('#Class').append('<option value="">Select Class</option>');
            }
        });
    });
</script>
@endsection