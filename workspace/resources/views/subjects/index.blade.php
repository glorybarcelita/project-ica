@extends('layouts.app')
@section('content')
    <div class="container mt-4">
    <div class="card card-info">
        <div class="card-header">
            Subjects
            @if(Auth::user()->role_id == '1')
                
                 <a href="{{ route('subjects.create') }}" class="btn btn-info btn-sm float-right">Create Subject</a>
            @endif

        </div>
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <th>Actions</th>
                    <th>Subject Name</th>
                    <th>Course</th>
                    <th>Subject Description</th>
                    <th>Year Level</th>
                    
                </thead>
                <tbody>
                   @foreach($subjects as $subject)
                    <tr>
                        <td>
                            @if(Auth::user()->role_id == '1')
                                <a href="{{ route('subjects.edit',['id' => $subject->id] ) }}" class="btn btn-sm btn-info text-light">Edit</a>
                                <a href="{{ route('subjects.show',['id' => $subject->id] ) }}" class="btn btn-sm btn-primary">Syllabus</a>
                                
                            @elseif(Auth::user()->role_id == '4')
                                <a href="{{ route('subjects.edit',['id' => $subject->id] ) }}" class="btn btn-info btn-sm float-right">Assign a Lecturer</a>
                            @endif

                        </td>
                        
                        <td>{{ $subject->name }}</td>
                        
                        @foreach($courses as $course)
                            <td>{{ $course->course_id}}</td>
                        @endforeach
                        
                        <td>{{ $subject->description }}</td>
                        <td>{{ $subject->year_level }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
           A Total Registered Subject of {{ $subjects->count() }}
        </div>
        </div>
    </div>
</div>

<!--MODAL FOR SYLLABUS--> 
<!--di ko alam kung kailangan ba ung aria-->
<div class="modal fade" id="mod-add-syllabus" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="add-record">
        <input type="text" name="user_id" style="display:none" value="">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Syllabus</h5>
        </div>
        <div class="modal-body">
          <!--@include('subjects.syllabus')-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-close">Close</button>
        </div>
      </form>
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
