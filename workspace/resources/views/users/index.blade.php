@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="card card-info">
        <div class="card-header">
            Users
             <a href="{{ route('users.create') }}" class="btn btn-info btn-sm float-right">Create User</a>
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
                            <a href="{{ route('users.edit',['id' => $user->id] ) }}" class="btn btn-sm btn-info text-light">Edit</a>
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
        <div class="card-footer">
           A Total Registered User of {{ $users->count() }}
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