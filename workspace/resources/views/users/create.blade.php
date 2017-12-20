@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="card card-info">
        <div class="card-header">
            Add User
        </div>
        <div class="card-body">
            @include('shared.alerts')
            <form method="POST" action="{{ route('users.store') }}">
                {{ csrf_field() }}
            <div class="form-group row">
                <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                     <select id="role_id" name="role_id" class="form-control">
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}" @if(old('role_id') == $role->id ) selected @endif>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
              <label for="stud_course" class="col-sm-2 col-form-label">Course</label>
              <div class="col-sm-10">
                  <select id="stud_course" name="stud_course" class="form-control">
                        @foreach($courses as $course)
                        <option value="{{ $course->id }}" @if(old('stud_course') == $course->id ) selected @endif>{{ $course->name }}</option>
                        @endforeach
                    </select>
              </div>
          </div>
            <div class="form-group row">
            <label for="user-status" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col">
                     <input type="text" class="form-control" id="" name="firstname" value="{{ old('firstname') }}" placeholder="First name">
                </div>
                <div class="col">
                     <input type="text" class="form-control" id="" name="middlename"value="{{ old('middlename') }}"  placeholder="Middle Initial name">
                </div>
                <div class="col">
                     <input type="text" class="form-control" id="" name="lastname" value="{{ old('lastname') }}" placeholder="Last name">
                </div>
          </div>
          
          <div class="form-group row">
              <label for="user-status" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                  <input type="email" class="form-control" id="" name="email" value="{{ old('email') }}" placeholder="Enter email">
              </div>
          </div>

          <center><button type="submit" class="btn btn-primary">Save</button></center>
        </div>
        </form>
        <div class="card-footer">
            Register User
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        let course = $('#stud_course');
        course.attr('disabled','disabled')
        $('#role_id').change(function()
        {
            let role = $('#role_id').val()
            if(role == 3)
            {
               course.removeAttr('disabled')
            }
            else
            {
              course.attr('disabled','disabled')
            }
        })
    </script>
@endpush