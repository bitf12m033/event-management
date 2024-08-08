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
                                <button class="btn btn-success btn-sm mb-3 btn-round" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i> Add Class</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="report-table" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th> <!-- Changed from ID to # -->
                                        <th>Class Name</th>
                                        <th>Level</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($classes as $class)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td> <!-- Use $loop->iteration for sequential numbering -->
                                            <td>{{ $class->class_name }}</td>
                                            <td>{{ $class->level->level_name }}</td>
                                            <td>
                                                <a href="{{ route('admin.classes.edit', $class->id) }}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                                <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $class->id }})"><i class="feather icon-trash-2"></i>&nbsp;Delete </button>
                                                <form id="delete-form-{{ $class->id }}" action="{{ route('admin.classes.destroy', $class->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
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
    <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.classes.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="ClassName">Class Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('class_name') is-invalid @enderror" id="ClassName" name="class_name" placeholder="" required>
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
                                        <option value="{{ $level->id }}">{{ $level->level_name }}</option>
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
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-danger"  type="reset">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(classId) {
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
                document.getElementById('delete-form-' + classId).submit();
            }
        })
    }
</script>

@endsection