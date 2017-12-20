@extends('layouts.app')
@section('content')
<a href="{{ route('subjects.index') }}" class="btn btn-md btn-outline-secondary">Go Back</a>
    <div class="container mt-4">
        <legend>Syllabus</legend>
        <muted> Syllabus or subject outline is a list of topic covered in a subject. </muted>   
    <div class="card card-info mt-3">
        <div class="card-header">
            <h3>{{ $subjects->name }}</h3>  Syllabus Topics table
            <a href="{{ url('syllabus/create/').'/'.$subjects->id }}" class="btn btn-info btn-sm float-right">Add Syllabus Topic</a>
        </div>
        
        
<!--TABLE FOR Syllabus-->
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <th>Actions</th>
                    <th>Syllabus</th>
                    <th>Description</th>
                </thead>
                <tbody>
                  @foreach($syllabuses as $syllabus)
                    <tr>
                        <td>
                             <a href="{{ url('syllabus/edit').'/'.$syllabus->id.'/'.$subjects->id }}" class="btn btn-sm btn-info text-light">Edit</a>
                            <button class="btn btn-sm btn-danger text-light" onclick="syllabus_delete(this.name);" name="{{$syllabus->id}}">Delete</button>
                        </td>
                        <td>{{ $syllabus->name }}</td>
                        <td>{{ $syllabus->description }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
           A Total Registered Subject of {{ count($syllabuses) }}
        </div>
        
</div>
</div>

<!--MODAL FOR DELETE--> 
<div class="modal fade" id="mod-syllabus-delete" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="delete-record-topic" method="POST" action="{{ url('syllabus/destroy') }}">
        {{ csrf_field() }}
        <div class="modal-header">
          <h5 class="modal-title">Delete Topic?</h5>
        </div>
        <div class="modal-body">
          <label>Are you sure you want to delete this topic?</label>
          <input type="hidden" id="syl_id" name="syllabus_id_delete">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="btn-delete-topic-no">No</button>
          <button type="submit" class="btn btn-primary" id="btn-delete">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    function syllabus_delete($id) {
        var syllabus_id = $id;
        $('#syl_id').val(syllabus_id);
        $('#mod-syllabus-delete').modal('show');
    };
</script>

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
