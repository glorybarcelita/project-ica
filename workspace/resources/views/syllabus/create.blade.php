@extends('layouts.app')
@section('content')
<a href="{{ route('syllabus.index') }}" class="btn btn-md btn-outline-secondary">Go Back</a>

<div class="container mt-4">
    <div class="card card-info">
        <div class="card-header">
            Syllabus
        </div>
         <div class="card-body">
          
            <form method="POST" action="{{ route('syllabus.store') }}">
                {{ csrf_field() }}
                @include('shared.alerts')
                
                 <div class="form-group row">
                    <label for="user-status" class="col-sm-2 col-form-label">Topic</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="syllabustopic" value = "{{ old('syllabustopic') }}"  placeholder="Topic">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="user-status" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" placeholder="Description">{{ old('description') }}</textarea>             
                    </div>
               </div>
                
              <center><button type="submit" class="btn btn-primary">Save</button></center>
            </form>
        </div>
        <div class="card-footer">
            Register Subject
        </div>
    </div>
</div>
@endsection