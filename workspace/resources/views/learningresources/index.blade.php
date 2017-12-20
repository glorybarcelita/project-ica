@extends('layouts..app')
@section('content')
 <div class="container mt-4">
     <legend>Learning Resources</legend>
     <muted>Is a subject that has a collection of topics with learning Resources</muted>    
    <div class="card card-info mt-3">
        <div class="card-header">
            Subjects
            <a href="" class="btn btn-sm btn-info float-right">Edit Approval</a>
        </div>
        <div class="row">
                @foreach($subjects as $subject)
                <div class="col-sm-3">
                    <div class="card border-info my-3 mx-3" style="max-width: 20rem;">
                      <div class="card-header"><h5><a href="{{ route('subjecttopic.index',['id' => $subject->id] ) }}" class="label text-info">{{ $subject->name }}</a></h5></div>
                      
                      <div class="card-body">
                          <h6 class="text-info">Description</h6>
                          <p class="card-text">{{ $subject->description }}</p>
                          <h6 class="text-info">Lecturer</h6>
                          <p class="card-text">{{ $subject->user_id}}</p>
                      </div>
                      <div class="card-footer">
                          <button class="btn btn-info" data-toggle="modal" data-target="#updateIcaSubject">Update</button>
                      </div>
                    </div>
                </div>
                @endforeach
            
        </div>
        
    </div>
</div>


@endsection