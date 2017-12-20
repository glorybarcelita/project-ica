@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="card card-info">
        <div class="card-header">
            Assign a Lecturer
        </div>
         <div class="card-body">
            
            <form method="POST" action="{{ route('subjects.update',['id'=> $subject->id]) }}">
                {{ csrf_field() }}
                @include('shared.alerts')
                {{ method_field('PUT') }}
                
                <h3>{{ $subject->name}}</h3>
                
                <div class="form-group row">
                <label for="role_id" class="col-sm-2 col-form-label">Lecturer</label>
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
            Register Subject
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