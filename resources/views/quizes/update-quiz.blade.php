@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <a href="{{ url('quiz/'.$subject->id.'/'.$syllabus->id) }}" class="btn btn-md btn-outline-secondary">Go Back</a>
    <div class="card card-info mt-4">
        <div class="card-header">
            Update Exam question
        </div>
         <div class="card-body">
            <form method="POST" action="{{ url('quiz/updateQuiz') }}">
              {{ csrf_field() }}
              @include('shared.alerts')
              <input type="hidden" name="syllabus_id" value="{{ $syllabus->id}}">
              <input type="hidden" name="quiz_id" value="{{ $questions->id}}">
              <div class="form-group row">
                    <label for="user-status" class="col-sm-2 col-form-label">Question</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="quizquestion" placeholder="Add Question" required>{{ $questions->question }}</textarea>
                    </div>
               </div>
              @foreach($choices as $key=>$choice)
                  <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">{{$key+1}}.</span>
                        <input type="text" class="form-control" name="answer[]" value="{{$choice->choices}}" required>
                        <span class="input-group-addon">
                          <input type="radio" name="choice" value="true" id="rad_choice{{$key+1}}" {{$choice->is_correct == 'true' ? 'checked':''}} required>
                        </span>
                      </div>
                  </div>
                  <input type="hidden" name="is_correct[]" id="is_correct{{$key+1}}" value="{{$choice->is_correct == 'true' ? 'true':'false'}}">
              @endforeach

                  
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