@extends('layouts..app')
@section('content')

<div class="container mt-4">
    <a href="{{ url('reports/quiz') }}" class="btn btn-md btn-outline-secondary">Go Back</a>
    <legend>Quiz Statistics</legend>
        <div class="card card-info mt-4">
{{--         <div class="card-header">
            ALL
             {{$quiz_stats}}
             
        </div> --}}
      <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <th>Question</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Lecturer Name</th>
                </thead>
                <tbody>
                   @foreach($quiz_stats as $quiz_stat)
                    <tr>
                        <td>{{ App\Quiz::find($quiz_stat->quiz_id)->question }}</td>
                        <td>{{ App\User::find($quiz_stat->student_id)->firstname }} {{ App\User::find($quiz_stat->student_id)->lastname }}</td>
                        <td>{{ App\Models\Course::find(App\User::find($quiz_stat->student_id)->course)->name}}</td>
                        <td>{{ strtoupper($quiz_stat->pass_fail == 'pass' ? 'Correct':'Wrong') }}</td>
                        <td>{{ App\User::find($quiz_stat->lecturer_id)->firstname }} {{ App\User::find($quiz_stat->lecturer_id)->lastname }}</td>
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