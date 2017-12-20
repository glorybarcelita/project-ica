@extends('layouts..app')
@section('content')
    <div class="container mt-4">
        <h3 class="text-info">{{ $subject->name }} > {{ $syllabus->name }} > Quiz</h3>
        @if(Auth::user()->role_id==3)
        <a href="{{ url('quiz/add-question') }}/{{$subject->id}}/{{$syllabus->id}}" class="btn btn-md btn-info mt-3 pull-right">Add Question</a>
        @endif
        <div class="card card-info mt-4">
            <div class="card-header">
            Quiz questions<br>

            </div>
            <div class="card-body">
              <table class="table table-bordered mt-4" id="myTable">
                  <thead>
                    <tr>
                      <th width="100px">Action</th>
                      <th>Question</th>
                      <th>Choice 1</th>
                      <th>Choice 2</th>
                      <th>Choice 3</th>
                      @if(Auth::user()->role_id == 4)
                       <th>Answer</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($questions as $question)
                    <tr>
                      <td>
                        @if(Auth::user()->role_id == 4)
                          <button type="button" id="{{$question->id}}" class="btn btn-sm btn-outline-success btnAns">Answer</a>
                        @else
                          <a href="{{ url('quiz/update-question/'.$subject->id.'/'.$syllabus->id.'/'.$question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>&nbsp;&nbsp;&nbsp;
                          <button type="button" id="{{$question->id}}" class="btn btn-sm btn-outline-danger btnDelete">Delete</a>
                        @endif
                      </td>
                      <td>{{$question->question}}</td>
                      @foreach($choices as $choice)
                        @if($choice->quiz_id == $question->id)
                          <td {{Auth::user()->role_id != 4 ? $choice->is_correct == 'true' ? 'style=background-color:#28a745!important;':'' : ''}}>
                            {{$choice->choices}}
                          </td>
                        @endif
                      @endforeach
                      @if(Auth::user()->role_id == 4)
                        <td id="student_ans{{$question->id}}"></td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>

    @if(Auth::user()->role_id == 4)
      <div class="col-lg-12 mt-4">
      <form class="form-horizontal" method="POST" action="{{ url('quiz/put-answer') }}">
        {{ csrf_field() }}
        <label>Select lecturer:</label>
        <select class="form-control" name="lecturer_id" required>
          @foreach($lecturers as $lecturer)
            <option value="{{$lecturer->id}}">{{$lecturer->firstname}} {{$lecturer->lastname}}</option>
          @endforeach
        </select><br>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
        <input type="hidden" name="subject_id" value="{{$syllabus->id}}"><br>
        @foreach($questions as $question)
          <input type="hidden" name="question_id[]" value="{{$question->id}}">
          <?php $i=0; ?>
          @foreach($choices as $choice)
            @if($choice->quiz_id == $question->id)
              <?php 
                $i= $i+1; 
              ?>
              @if($choice->is_correct == 'true')
                <input type="hidden" name="correct_ans[]" value="choice {{$i}}">
              @endif
            @endif
          @endforeach
          <input type="hidden" name="student_ans[]" class="student_ans{{$question->id}}" value=""><br>
        @endforeach
      </form>
      </div>
    @endif

<!--MODAL FOR DELETE--> 
<div class="modal fade" id="mod-quiz-delete" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="delete-record-topic" method="POST" action="{{ url('quiz/delete') }}">
        {{ csrf_field() }}
        <div class="modal-header">
          <h5 class="modal-title">Delete quiz?</h5>
        </div>
        <div class="modal-body">
          <label>Are you sure you want to delete this quiz question?</label>
          <input type="hidden" id="delQuiz" name="quiz_id_delete">
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" id="btn-delete-topic-no" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" id="btn-delete">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--MODAL FOR ANSWER--> 
<div class="modal fade" id="mod-quiz-ans" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">What's your answer ?</h5>
        </div>
        <div class="modal-body">
          <input type="radio" name="choice" value="choice 1"> Choice 1<br>
          <input type="radio" name="choice" value="choice 2"> Choice 2<br>
          <input type="radio" name="choice" value="choice 3"> Choice 3
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-primary btnPutAns">Yes</button>
        </div>
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
    var ques_id = '';
    var selValue = ''

    $('#myTable').DataTable();

    $('.btnDelete').click(function(){
      $('#delQuiz').val(this.id);
      $('#mod-quiz-delete').modal('show');
    });

    $('.btnAns').click(function(){
      $('input[name=choice]:checked').prop('checked', false); 
      ques_id = this.id;
      $('#mod-quiz-ans').modal('show');
    });

    $('.btnPutAns').click(function(){
      selValue = $('input[name=choice]:checked').val(); 
      $('#student_ans'+ques_id).text(selValue );
      $('.student_ans'+ques_id).val(selValue );
      $('#mod-quiz-ans').modal('hide');
    });
</script>
@endpush