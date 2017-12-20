@extends('layouts..app')
@section('content')

<div class="container mt-4">
    <legend>Exam</legend>
    {{-- <div class="btn-group">
      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Subjects
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">All</a>
        <a class="dropdown-item" href="#">Lecturer</a>
        <a class="dropdown-item" href="#">Students</a>
       
      </div> --}}
    </div>
        <div class="card card-info mt-4">
        <div class="card-header">
            Exam Statistics
             
        </div>
      <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <th>Subject</th>
                    <th>Student Name</th>
                    <th>Student's course</th>
                    <th>Lecturer Name</th>
                    
                </thead>
                <tbody>
                   @foreach($exams as $exam)
                    <tr>
                        <td>
                            {{ App\Models\Subjects::find($exam->quiz_id)->name }}
                        </td>
                        <td>{{ App\User::find($exam->student_id)->firstname }} {{ App\User::find($exam->student_id)->lastname }}</td>
                        <td>{{ App\Models\Course::find(App\User::find($exam->student_id)->course )->name }}</td>
                        <td>{{ App\User::find($exam->lecturer_id)->firstname}} {{ App\User::find($exam->lecturer_id)->lastname}}</td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
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