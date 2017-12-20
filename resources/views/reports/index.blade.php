@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <legend>Users</legend>
    <div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>
    
  {{--   <a href="{{ route('users.create') }}" class="btn btn-info btn-sm float-right">Request User Registration</a> --}}
    <div class="card card-info mt-3">
        <div class="card-header">
            <!-- Example single danger button -->



            Users Table
         
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <th>Actions</th>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Date Created</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="" class="btn btn-sm btn-success text-light">Edit</a>
                        </td>
                        <td>aaa</td>
                        <td>aa</td>
                        <td>aa</td>
                        <td>aa</td>
                        <td>aa</td>
                        <td>aa</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
           A Total Registered User of 
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