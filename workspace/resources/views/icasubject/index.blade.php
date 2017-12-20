@extends('layouts.app')
@section('content')


    
  <div class="card-body">
    <!-- Button trigger modal -->
     <a href="{{ route('icasubject.create') }}" class="btn btn-info">Create ICA Subject</a>
             
      <button class="btn btn-primary" data-toggle="modal" data-target="#">Pending Requests</button>
  </div>
  
<legend class="ml-4">ICA Subjects</legend>
<hr>

<div class="card border-info mb-3" style="max-width: 20rem;">
  <div class="card-header"><h5>ICA Subject Name</h5></div>
  <div class="card-body">
      <a data-toggle="collapse" href="#" id="3" onclick="getSubjects(this.id)" aria-expanded="true" aria-controls="ica-subjs-collapse">Tagged Subjects</a>
      <h6 class="text-info">Overview</h6>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <h6 class="text-info">Lecturer</h6>
      <p class="card-text">Lecturer A Ediwaw Jr.</p>
  
  </div>
  <div class="card-footer">
      <button class="btn btn-info" data-toggle="modal" data-target="#updateIcaSubject">Update</button>
      
  </div>
</div>












<!-- ADD Modal -->
<div class="modal fade" id="addIcaSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New ICA Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
              <label for="user-status" class="col-sm-2 col-form-label">ICA Subject Name</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="" name="name" value="" >
              </div>
        </div>
        
        <div class="form-group row">
            <label for="role_id" class="col-sm-2 col-form-label">Subjects</label>
            <div class="col-sm-10">
                 <select data-placeholder="Select subjects..." id="subject_id" name="subject_id" class="form-control">
                    <option>pawer</option>
                    <option>ediwaw</option>
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
                    <option>pawer</option>
                     <option>ediwaw</option>
                </select>
            </div>
        </div>
        
          <div class="form-group row">
            <label for="role_id" class="col-sm-2 col-form-label">Related Lecturer</label>
            <div class="col-sm-10">
                 <select id="relatedLecturer_id" name="relatedLecturer_id" class="form-control">
                    <option>pawer</option>
                     <option>ediwaw</option>
                </select>
            </div>
        </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!--END ADD MODAL-->


<!-- UPDATE Modal -->
<div class="modal fade" id="updateIcaSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New ICA Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
            <div class="form-group row">
            <label for="role_id" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                 <select id="subject_id" name="subject_id" class="form-control">
                    <option>Inactive</option>
                    <option>Active</option>
                    <option>WIP</option>
                </select>
            </div>
        </div>
          
        <div class="form-group row">
              <label for="user-status" class="col-sm-2 col-form-label">ICA Subject Name</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="" name="name" value="" >
              </div>
        </div>
        
        <div class="form-group row">
            <label for="role_id" class="col-sm-2 col-form-label">Subjects</label>
            <div class="col-sm-10">
                 <select id="subject_id" name="subject_id" class="form-control">
                    <option>pawer</option>
                     <option>ediwaw</option>
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
                    <option>pawer</option>
                     <option>ediwaw</option>
                </select>
            </div>
        </div>
        
          <div class="form-group row">
            <label for="role_id" class="col-sm-2 col-form-label">Related Lecturer</label>
            <div class="col-sm-10">
                 <select id="relatedLecturer_id" name="relatedLecturer_id" class="form-control">
                    <option>pawer</option>
                     <option>ediwaw</option>
                </select>
            </div>
        </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!--END ADD MODAL-->




<hr>

@endsection