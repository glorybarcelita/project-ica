@extends('layouts.app')
@section('content')
<a href="{{ route('courses.index') }}" class="btn btn-md btn-outline-secondary">Go Back</a>

<div class="container mt-4">
    <div class="card card-info">
        <div class="card-header">
            Add Course
        </div>
         <div class="card-body">
            <form method="POST" action="{{ route('courses.update',['id' => $course->id ]) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                @include('shared.alerts')
                <div class="form-group row">
                <label for="is_active" class="col-sm-2 col-form-label">Status</label>
                
                <div class="col-sm-10">
                     <select id="is_active" name="is_active" class="form-control">
                        <option value="0" @if(!$course->is_active) selected @endif>Inactive</option>
                        <option value="1" @if($course->is_active) selected @endif>Active</option>
                    </select>
                </div>
            </div>
                <div class="form-group row">
                  <label for="user-status" class="col-sm-2 col-form-label">Course Name</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="" name="course" value = "{{ old('course') ?: $course->name }}"  placeholder="Course">
                  </div>
                </div>
                
              
              <div class="form-group row">
                  <label for="user-status" class="col-sm-2 col-form-label">Course Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="description" placeholder="Description">{{ old('description') ?: $course->description }}</textarea>             
                  </div>
              </div>
              <center><button type="submit" class="btn btn-primary">Save</button></center>
            </form>
        </div>
        <div class="card-footer">
            Register User
        </div>
    </div>
</div>
@endsection