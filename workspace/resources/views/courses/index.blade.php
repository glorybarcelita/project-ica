@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="card card-info">
        <div class="card-header">
            Course
             <a href="{{ route('courses.create') }}" class="btn btn-info btn-sm float-right">Create Course</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <th>Actions</th>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Course Name</th>
                    <th>Description</th>
                    
                </thead>
                <tbody>
                   @foreach($courses as $course)
                    <tr>
                        <td>
                            <a href="{{ route('courses.edit',['id' => $course->id ] ) }}" class="btn btn-sm btn-info text-light">Edit</a>
                           
                        </td>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->is_active }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
           A Total Registered Course of {{ $courses->count() }}
        </div>
        </div>
    </div>
</div>



@endsection
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endpush
@push('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#myTable').DataTable();
</script>
@endpush
