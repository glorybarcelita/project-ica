@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <legend>Subjects</legend>
      
    <div class="card card-info mt-3">
        <div class="card-header">
            Subjects Table
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
                                <button class="btn btn-sm btn-outline-danger btnDelete" id="{{$subject->id}}">Delete</button>

                               
                                <a href="{{ route('subjects.edit',['id' => $subject->id] ) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                <a href="{{ route('subjects.show',['id' => $subject->id] ) }}" class="btn btn-sm btn-outline-primary">Syllabus</a>
                                
                            @elseif(Auth::user()->role_id == '2')
                                <a href="{{ url('sujects/assign-lecturer').'/'.$subject->id }}" class="btn btn-info btn-sm float-right">Assign a Lecturer</a>
                            @endif

                        </td>
                        
                        <td>{{ $subject->name }}</td>
                        
                        <td>
                            @foreach($subj_courses as $subj_course)
                                @foreach($courses as $course)
                                    {{ $subject->id == $subj_course->subject_id ? $subj_course->course_id == $course->id ? $course->name:'' :'' }}
                                @endforeach
                            @endforeach
                        </td>
                        
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

<!--MODAL FOR DELETE--> 
<div class="modal fade" id="mod-subject-delete" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="delete-record-topic" method="POST" action="{{ url('subject/delete') }}">
        {{ csrf_field() }}
        <div class="modal-header">
          <h5 class="modal-title">Delete Subject?</h5>
        </div>
        <div class="modal-body">
          <label>Are you sure you want to delete this Subject?</label>
          <input type="hidden" id="sub_id" name="subject_id_delete">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="btn-delete-topic-no" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" id="btn-delete">Yes</button>
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
<script type="text/javascript">
    $('.btnDelete').click(function(){
        $('#sub_id').val(this.id);
        $('#mod-subject-delete').modal('show');
    })
        
</script>
@endpush
