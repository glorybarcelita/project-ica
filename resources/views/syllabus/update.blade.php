@extends('layouts.app')
@section('content')
<a href="{{ url('subjects').'/'.$subjects->id  }}" class="btn btn-md btn-outline-secondary">Go Back</a>

<div class="container mt-4">
    <div class="card card-info">
        <div class="card-header">
            Syllabus {{ $subjects->name }}
        </div>
         <div class="card-body">
            <form method="POST" action="{{ url('syllabus/update') }}">
                {{ csrf_field() }}
                @include('shared.alerts')
                
                 <div class="form-group row">
                    <label for="user-status" class="col-sm-2 col-form-label">Topic</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="" name="syllabus_id" value = "{{ $syllabus->id }}">
                        <input type="text" class="form-control" id="" name="syllabustopic" value = "{{ old('syllabustopic') == '' ? $syllabus->name:'' }}"  placeholder="Topic">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="user-status" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" placeholder="Description">{{ old('description') == '' ? $syllabus->description:'' }}</textarea>             
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