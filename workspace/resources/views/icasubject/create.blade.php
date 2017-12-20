@extends('layouts.app')
@section('content')
<a href="{{ route('icasubject.index') }}" class="btn btn-md btn-outline-secondary">Go Back</a>

<div class="container mt-4">
    <div class="card card-info">

        <div class="card-header">
            New ICA Subject
        </div>
         <div class="card-body">
            <form method="POST" action="{{ route('icasubject.store') }}">
                {{ csrf_field() }}
                @include('shared.alerts')
                  <div class="form-group row">
              <label for="user-status" class="col-sm-2 col-form-label">ICA Subject Name</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="" name="name" value="" >
              </div>
        </div>
        
        
        <div class="form-group row">
                      <label for="user-status" class="col-sm-2 col-form-label">Subjects</label>
                    <div class="col-sm-4">
                        <select id="dates-field2" name="subject_id"class="multiselect-ui form-control" multiple="multiple">
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" @if(old('subject_id') == $subject->id ) selected @endif>{{ $subject->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>
        </div>
        
         <div class="form-group row">
            <label for="user-status" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" placeholder="Description">{{ old('description') }}</textarea>             
            </div>
        </div>
        
         <div class="form-group row">
            <label for="role_id" class="col-sm-2 col-form-label">Assigned Lecturer</label>
            <div class="col-sm-10">
                 <select id="lecturer_id" name="lecturer_id" class="form-control">
                     @foreach($users as $user)
                    <option value="{{ $user->id }}" @if(old('relatedLecturer_id') == $user->id ) selected @endif>{{ $user->firstname.' '.$user->lastname }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        
                
              <center><button type="submit" class="btn btn-primary">Save</button></center>
            </form>
        </div>
        <div class="card-footer">
            Register ICA Subject
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/multiselect.js') }}">                                                                             </script>
<script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>
@endpush
@push('styles')
<style>
    span.multiselect-native-select {
	position: relative
}
span.multiselect-native-select select {
	border: 0!important;
	clip: rect(0 0 0 0)!important;
	height: 1px!important;
	margin: -1px -1px -1px -3px!important;
	overflow: hidden!important;
	padding: 0!important;
	position: absolute!important;
	width: 1px!important;
	left: 50%;
	top: 30px
}
.multiselect-container {
	position: absolute;
	list-style-type: none;
	margin: 0;
	padding: 0
}
.multiselect-container .input-group {
	margin: 5px
}
.multiselect-container>li {
	padding: 0
}
.multiselect-container>li>a.multiselect-all label {
	font-weight: 700
}
.multiselect-container>li.multiselect-group label {
	margin: 0;
	padding: 3px 20px 3px 20px;
	height: 100%;
	font-weight: 700
}
.multiselect-container>li.multiselect-group-clickable label {
	cursor: pointer
}
.multiselect-container>li>a {
	padding: 0
}
.multiselect-container>li>a>label {
	margin: 0;
	height: 100%;
	cursor: pointer;
	font-weight: 400;
	padding: 3px 0 3px 30px
}
.multiselect-container>li>a>label.radio, .multiselect-container>li>a>label.checkbox {
	margin: 0
}
.multiselect-container>li>a>label>input[type=checkbox] {
	margin-bottom: 5px
}
.btn-group>.btn-group:nth-child(2)>.multiselect.btn {
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px
}
.form-inline .multiselect-container label.checkbox, .form-inline .multiselect-container label.radio {
	padding: 3px 20px 3px 40px
}
.form-inline .multiselect-container li a label.checkbox input[type=checkbox], .form-inline .multiselect-container li a label.radio input[type=radio] {
	margin-left: -20px;
	margin-right: 0
}
</style>
@endpush