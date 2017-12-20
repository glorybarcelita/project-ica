@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                       <div class="col-md-4">
                          <center>
                            <a href="{{ route('users.index') }}"><span class="sr-only">(current)</span><i class="fa fa-users fa-fontsize" aria-hidden="true"></i>icon</a>
                            
                            <h6>Users</h6>  
                            <h1>000</h1>
                          </center>
                        </div>

                        <div class="col-md-4">
                          <center>
                             <a href="{{ route('learningresources.index') }}"><span class="sr-only">(current)</span><i class="fa fa-star-o fa-fontsize" aria-hidden="true"></i>icon</a>
                            
                            <h6>Learning Resources</h6>
                            <h1>000</h1>
                          </center>
                        </div>

                        <div class="col-md-4">
                          <center>
                            <a href="{{ route('learningresources.index') }}"><span class="sr-only">(current)</span><i class="fa fa-star-o fa-fontsize" aria-hidden="true"></i>icon</a>
                            
                            <h6>Achiever's Wall</h6>
                            <h1>000</h1>
                          </center>
                        </div>
                    </div>
                </div>
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
                                <a href="{{ route('users.edit',['id' => $user->id] ) }}" class="btn btn-sm btn-success text-light">Edit</a>
                            </td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->is_active }}</td>
                            <td>{{ $user->created_at  }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
