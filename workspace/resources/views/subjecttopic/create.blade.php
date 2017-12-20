@extends('layouts.app')
@section('content')
<a href="{{ route('learningresources.index') }}" class="btn btn-md btn-outline-secondary">Go Back</a>

<div class="container mt-4">
    <div class="card card-info">
        <div class="card-header">
            Add Course
        </div>
         <div class="card-body">
            <form method="POST" action="{{ route('subjecttopic.store') }}">
                {{ csrf_field() }}
                @include('shared.alerts')
                <div class="form-group row">
                  <label for="user-status" class="col-sm-2 col-form-label">Topic Title</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="" name="title" value = "{{ old('title') }}"  placeholder="Title">
                  </div>
                </div>
                
              
              <div class="form-group row">
                  <label for="user-status" class="col-sm-2 col-form-label">Note</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="note" placeholder="Description">{{ old('note') }}</textarea>             
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