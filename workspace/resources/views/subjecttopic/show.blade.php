@extends('layouts.app')
@section('content')
<a href="{{ route('subjecttopic.index') }}" class="btn btn-md btn-outline-secondary">Go Back</a>
<div class="container mt-4">
     <h3 class="text-info">{{ $subjects->name }}</h3>
     
     <muted class="text-secondary">Is a subject that has a collection of topics with learning Resources</muted>
    <br>
    
    
    <a href="{{ route('subjecttopic.show') }}" class="btn btn-md btn-info mt-3">Add Topic</a>
    <div class="card card-info  mt-3">
    
         <div class="row">
               
                <div class="col-sm-3">
                    <div class="card border-info my-3 mx-3" style="max-width: 20rem;">
                      <div class="card-header">
                        <h5><a href="" class="label text-info">aaaa</a></h5>
                      </div>
                      
                      <div class="card-body">
                          
                          <h6 class="text-info">Description</h6>
                          <p class="card-text">sampleee</p>
                          <h6 class="text-info">Lecturer</h6>
                          <p class="card-text">ediaww</p>
                      </div>
                      <div class="card-footer">
                          <button class="btn btn-info" data-toggle="modal" data-target="#updateIcaSubject">Update</button>
                      </div>
                    </div>
                </div>
        </div>
        
    </div>
</div>