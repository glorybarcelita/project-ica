@extends('layouts..app')
@section('content')
    
    <br>
   
      <div class="col-lg-12">
         <h3 class="text-info">{{ $subject->name }}</h3>
         <h6>Year Level: {{ $subject->year_level }}</h6>
     <muted class="text-secondary"><strong>Description: </strong>{{ $subject->description }}</muted>
     <hr>
      @if(Auth::user()->role_id == 3)
        <a href="{{ url('learning-resources/subject/create').'/'.$subject_id }}" class="btn btn-md btn-info mt-3 pull-right">Add Topic</a>
        <a href="{{ url('exams/'.$subject_id) }}" class="btn btn-md btn-info mt-3 pull-right">View Exam</a>
      @elseif(Auth::user()->role_id == 4)
        <a href="{{ url('exams/'.$subject_id) }}" class="btn btn-md btn-info mt-3 pull-right btnExam">Take Exam</a>
      @endif
    </div>
    <div class="card card-info  my-3 ml-3">
        @foreach($topics as $topic)
          <div class="row">
            @if(Auth::user()->role_id==4)
              <h4 class="text-dark col-lg-12 mx-3 mt-2">{{ $topic->name }}
                  <br>
                  <a href="{{ url('quiz/'.$subject->id.'/'.$topic->id) }}" class="btn btn-sm btn-secondary mt-2 pull-right btn{{$topic->id}}">Take quiz</a>
                  <div class="div{{$topic->id}}"></div>
              </h4>
            @elseif(Auth::user()->role_id==3)

              <h4 class="text-dark col-lg-12 mx-3 mt-2">{{ $topic->name }} <br> <a href="{{ url('quiz/'.$subject->id.'/'.$topic->id) }}" class="btn btn-sm btn-secondary mt-2 pull-right">View quiz</a></h4>
            @endif
            
            @if(count($subject_topics) > 0)
              @foreach($subject_topics as $subject_topic)
                @if($subject_topic->syllabus_id == $topic->id)
                <div class="col-sm-3">
                  <div class="card border-info my-3 mx-3" style="max-width: 25rem;">
                    <div class="card-header">
                      <h5><a href="{{ url('learning-resources/subject/details').'/'.$subject_id.'/'.$topic->id.'/'.$subject_topic->id }}" class="label text-info">{{$subject_topic->topic_title}}</a></h5>
                    </div>
                    
                    <div class="card-body">
                        
                        <h6 class="text-info">Note</h6>
                        <p class="card-text">{{$subject_topic->note}}</p>
                    </div>
                    @if(Auth::user()->role_id == 3)
                      <div class="card-footer">
                          <button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#updateIcaSubject">Update</button>
                          <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#updateIcaSubject">Delete</button>
                      </div>
                    @endif
                  </div>
                </div>
                @endif
              @endforeach
            @else
              <p class="col-lg-12" style="padding-left: 50px;">No Topics Added.</p>
            @endif
          </div>
        @endforeach
    </div>
@endsection
@push('scripts')
  <script type="text/javascript">
    $( document ).ready(function() {
      var fail_count = 0;
      @foreach($topics as $topic)
        @if(count($quiz_record)>0)
          @foreach($quiz_record as $record)
            @if($record->quiz_id == $topic->id)
              @if($record->pass_fail == 'pass')
                $('.btn{{$record->quiz_id}}').hide();
              @else
                fail_count = fail_count + 1;
              @endif
              $('.div{{$record->quiz_id}}').show();
              $('.div{{$record->quiz_id}}').html(' Quiz result: {{strtoupper($record->pass_fail)}} ');
            @endif
          @endforeach

        @endif
      @endforeach
                if(fail_count >= 1){
            $('.btnExam').hide();
          }
    });
  </script>
@endpush
