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
                                <a href="{{ route('admin.subjects.create') }}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Add Subject</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="report-table" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subject Name</th>
                                        <th>Class</th>
                                        <th>Price</th>
                                        <th>Created At</th>
                                        <th>Locked Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subjects as $subject)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subject->subject_name }}</td>
                                       <td>
                                            @if($subject->class)
                                                {{ $subject->class->class_name }}
                                            @else
                                                N/A
                                            @endif
                                       </td>
                                       <td>{{ $subject->price }}</td>
                                        <td>{{ $subject->created_at }}</td>
                                        <td>
                                            <button class="btn btn-sm toggle-lock" data-subject-id="{{ $subject->id }}">
                                                @if($subject->is_locked)
                                                    <i class="fas fa-lock text-danger" title="Locked"></i>
                                                @else
                                                    <i class="fas fa-lock-open text-success" title="Unlocked"></i>
                                                @endif
                                            </button>
                                        </td>
                                        
                                        <td>
                                           
                                            <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                            <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" style="display:inline;" class="delete-form">
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
document.addEventListener('DOMContentLoaded', function() {
   

    // Function to handle toggle lock
    function handleToggleLock(event) {
        debugger;
        event.preventDefault();
        const button = event.currentTarget;
        const subjectId = button.getAttribute('data-subject-id');
        const icon = button.querySelector('i');

        fetch(`{{ route('admin.subjects.toggle-lock', ':id') }}`.replace(':id', subjectId), {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.is_locked) {
                    icon.className = 'fas fa-lock text-danger';
                    icon.title = 'Locked';
                } else {
                    icon.className = 'fas fa-lock-open text-success';
                    icon.title = 'Unlocked';
                }
                Swal.fire({
                    icon: 'success',
                    title: 'Status Updated',
                    text: `Subject is now ${data.is_locked ? 'locked' : 'unlocked'}`,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        });
    }

    // Use event delegation for toggle lock buttons
    // Use event delegation for toggle lock buttons
document.getElementById('report-table').addEventListener('click', function(event) {
    const toggleButton = event.target.closest('.toggle-lock');
    if (toggleButton) {
        event.preventDefault();
        const subjectId = toggleButton.getAttribute('data-subject-id');
        const icon = toggleButton.querySelector('i');

        if (!subjectId) {
            console.error('Subject ID is missing');
            return;
        }

        fetch(`{{ route('admin.subjects.toggle-lock', ':id') }}`.replace(':id', subjectId), {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.is_locked) {
                    icon.className = 'fas fa-lock text-danger';
                    icon.title = 'Locked';
                } else {
                    icon.className = 'fas fa-lock-open text-success';
                    icon.title = 'Unlocked';
                }
                Swal.fire({
                    icon: 'success',
                    title: 'Status Updated',
                    text: `Subject is now ${data.is_locked ? 'locked' : 'unlocked'}`,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        });
    }
});

    // Handle delete buttons (also using event delegation)
    document.getElementById('report-table').addEventListener('click', function(event) {
        if (event.target.closest('.delete-button')) {
            event.preventDefault();
            const form = event.target.closest('form');
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
        }
    });
});
</script>

@endsection