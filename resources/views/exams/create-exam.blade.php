@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <a href="{{ url('exams/'.$subject->id) }}" class="btn btn-md btn-outline-secondary">Go Back</a>
    <div class="card card-info mt-4">
        <div class="card-header">
            Add Exam question
        </div>
         <div class="card-body">
            <form method="POST" action="{{ url('exams/store') }}">
              {{ csrf_field() }}
              @include('shared.alerts')
              <input type="hidden" name="subject_id" value="{{ $subject->id}}">
              <div class="form-group row">
                    <label for="user-status" class="col-sm-2 col-form-label">Question</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="examquestion" placeholder="Add Question" required>{{ old('examquestion') }}</textarea>             
                    </div>
               </div>

               <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">1.</span>
                      <input type="text" class="form-control" name="answer[]" required>
                      <span class="input-group-addon">
                        <input type="radio" name="choice" value="true" id="rad_choice1" required>
                      </span>
                    </div>
                </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">2.</span>
                      <input type="text" class="form-control" name="answer[]" required>
                      <span class="input-group-addon">
                        <input type="radio" name="choice" value="true" id="rad_choice2" required>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">3.</span>
                      <input type="text" class="form-control" name="answer[]" required>
                      <span class="input-group-addon">
                        <input type="radio" name="choice" value="true" id="rad_choice3" required>
                      </span>
                    </div>
                  </div>

                  <input type="hidden" name="is_correct[]" id="is_correct1" value="false">
                  <input type="hidden" name="is_correct[]" id="is_correct2" value="false">
                  <input type="hidden" name="is_correct[]" id="is_correct3" value="false">
         </div>
          <div class="card-footer" align="center">
            <button type="reset" class="btn btn-outline-danger" id="btn-reset-topics">Reset</button>
            <button type="submit" class="btn btn-outline-success" id="btn-save-topics">Submit</button>
          </div>
          </form>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
  $("#rad_choice1").click(function(){
    $('#is_correct1').val('true');
    $('#is_correct2').val('false');
    $('#is_correct3').val('false');
  });

  $("#rad_choice2").change(function(){
    $('#is_correct1').val('false');
    $('#is_correct2').val('true');
    $('#is_correct3').val('false');
  });

  $("#rad_choice3").change(function(){
    $('#is_correct1').val('false');
    $('#is_correct2').val('false');
    $('#is_correct3').val('true');
  });
</script>
@endpush