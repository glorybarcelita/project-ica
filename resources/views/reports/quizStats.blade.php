@extends('layouts..app')
@section('content')

<div class="container mt-4">
    <legend>Quiz STATS</legend>
    <div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Subjects
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">All</a>
    <a class="dropdown-item" href="#">Lecturer</a>
    <a class="dropdown-item" href="#">Students</a>
   
  </div>
</div>
        <div class="card card-info mt-4">
        <div class="card-header">
            ALL
             
        </div>
      <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <th>Quiz ID</th>
                    <th>Question</th>
                    <th>Correct</th>
                    <th>Wrong</th>
                    
                    
                </thead>
                <tbody>
                   
                    <tr>
                        <td>
                            <a href="" class="btn btn-sm btn-info text-light">Stats</a>
                           
                        </td>
                        <td>aaa</td>
                        <td>{aaa</td>
                        <td>{aaa</td>
                        <td>{aaa</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
        <div class="card-footer">
           A Total Registered Course of 
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