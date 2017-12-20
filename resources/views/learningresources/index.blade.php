@extends('layouts..app')
@section('content')
 <div class="container mt-4">
     <legend>Learning Resources</legend>
     <muted>Is a subject that has a collection of topics with learning Resources</muted>    
    <div class="card card-info mt-3">
        <div class="card-header">
            Subject Collection
{{--             @if(Auth::user()->role_id == 2)
              <a href="" class="btn btn-sm btn-info float-right">Edit Approval</a>
            @endif --}}
        </div>
        <div class="row">
          @if(Auth::user()->role_id == 4)
            @if(count($subjectsLists) == 0)
              <p>No topics added.</p>
            @else
              @foreach($subjectsLists as $subjectsList)
                @foreach($subjects as $subject)
                  @if($subject->id == $subjectsList->subject_id )
                    <div class="col-sm-3">
                        <div class="card border-info my-3 mx-3" style="max-width: 20rem;">
                          <div class="card-header"><h5><a href="{{ url('learning-resources/subject').'/'.$subject->id }}" class="label text-info">{{ $subject->name }}</a></h5></div>
                          
                          <div class="card-body">
                              <h6 class="text-info">Description</h6>
                              <p class="card-text">{{ $subject->description }}</p>
                              <h6 class="text-info">Lecturer</h6>
                              @foreach($lecturers as $lecturer)

                                @if($lecturer->id == $subject->user_id)
                                  <p class="card-text">{{ $lecturer->firstname}} {{ $lecturer->middlename}} {{ $lecturer->lastname}}</p>
                                @endif
                              @endforeach
                              <h6 class="text-info">Status</h6>
                              <p class="card-text">{{ $subject->is_active == 0 ? 'Inactive':'Active'}}</p>
                          </div>
                        </div>
                    </div>
                  @endif
                @endforeach
              @endforeach
            @endif
          @else
            @if(count($subjects) == 0)
              <p>No topics added.</p>
            @else
                @foreach($subjects as $subject)
                  @if(! ($subject->user_id == '' ))
                    <div class="col-sm-3">
                        <div class="card border-info my-3 mx-3" style="max-width: 20rem;">
                          <div class="card-header"><h5><a href="{{ url('learning-resources/subject').'/'.$subject->id }}" class="label text-info">{{ $subject->name }}</a></h5></div>
                          
                          <div class="card-body">
                              <h6 class="text-info">Description</h6>
                              <p class="card-text">{{ $subject->description }}</p>
                              <h6 class="text-info">Lecturer</h6>
                              @foreach($lecturers as $lecturer)

                                @if($lecturer->id == $subject->user_id)
                                  <p class="card-text">{{ $lecturer->firstname}} {{ $lecturer->middlename}} {{ $lecturer->lastname}}</p>
                                @endif
                              @endforeach
                              <h6 class="text-info">Status</h6>
                              <p class="card-text">{{ $subject->is_active == 0 ? 'Inactive':'Active'}}</p>
                          </div>
                        </div>
                    </div>
                  @endif
                @endforeach
            @endif
          @endif
        </div>
        
    </div>
</div>


@endsection